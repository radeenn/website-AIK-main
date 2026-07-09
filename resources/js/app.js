import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;

const renderIcons = () => requestAnimationFrame(() => createIcons({ icons }));

window.audioPlayer = () => ({
    playing: false,
    currentTime: 0,
    duration: 0,
    volume: 1,
    init() {
        const audio = this.$refs.audio;
        audio.volume = this.volume;
        audio.addEventListener('loadedmetadata', () => {
            this.duration = Number.isFinite(audio.duration) ? audio.duration : 0;
        });
        audio.addEventListener('timeupdate', () => { this.currentTime = audio.currentTime; });
        audio.addEventListener('play', () => { this.playing = true; renderIcons(); });
        audio.addEventListener('pause', () => { this.playing = false; renderIcons(); });
        audio.addEventListener('ended', () => {
            this.playing = false;
            this.currentTime = 0;
            window.dispatchEvent(new CustomEvent('reading-audio-ended', { detail: { audio } }));
            renderIcons();
        });
    },
    async toggle() {
        const audio = this.$refs.audio;
        if (audio.paused) {
            document.querySelectorAll('audio').forEach((item) => { if (item !== audio) item.pause(); });
            try { await audio.play(); } catch (error) { console.warn('Audio belum dapat diputar:', error); }
        } else {
            audio.pause();
        }
    },
    async play() {
        const audio = this.$refs.audio;
        document.querySelectorAll('audio').forEach((item) => { if (item !== audio) item.pause(); });
        try { await audio.play(); } catch (error) { console.warn('Audio belum dapat diputar:', error); }
    },
    seek() { this.$refs.audio.currentTime = Number(this.currentTime || 0); },
    setVolume() { this.$refs.audio.volume = Number(this.volume); },
    format(value) {
        if (!Number.isFinite(value)) return '0:00';
        const minutes = Math.floor(value / 60);
        const seconds = Math.floor(value % 60).toString().padStart(2, '0');
        return `${minutes}:${seconds}`;
    },
});

window.autoplayController = (enabledFromUrl = false, nextUrl = null) => ({
    active: Boolean(enabledFromUrl),
    nextUrl,
    init() {
        if (enabledFromUrl) {
            sessionStorage.setItem('sholat.autoplay', '1');
        }

        this.active = sessionStorage.getItem('sholat.autoplay') === '1' || Boolean(enabledFromUrl);

        window.addEventListener('reading-audio-ended', async (event) => {
            if (!this.active) return;

            const audios = Array.from(document.querySelectorAll('[data-audio-item] audio'));
            const currentIndex = audios.indexOf(event.detail?.audio);
            const nextAudio = currentIndex >= 0 ? audios[currentIndex + 1] : null;

            if (nextAudio) {
                document.querySelectorAll('audio').forEach((item) => { if (item !== nextAudio) item.pause(); });
                try { await nextAudio.play(); } catch (_) { /* keep autoplay active; user can press play manually */ }
                return;
            }

            if (this.nextUrl) {
                window.location.href = `${this.nextUrl}${this.nextUrl.includes('?') ? '&' : '?'}autoplay=1`;
            } else {
                this.stop();
            }
        });

        if (this.active) {
            this.$nextTick(() => this.startAudio());
        }
    },
    async start() {
        this.active = true;
        sessionStorage.setItem('sholat.autoplay', '1');
        await this.startAudio();
    },
    stop() {
        this.active = false;
        sessionStorage.removeItem('sholat.autoplay');
        document.querySelectorAll('audio').forEach((audio) => audio.pause());
    },
    async startAudio() {
        const audio = document.querySelector('[data-audio-item] audio');
        if (!audio) {
            if (this.nextUrl) {
                window.location.href = `${this.nextUrl}${this.nextUrl.includes('?') ? '&' : '?'}autoplay=1`;
            }
            return;
        }
        document.querySelectorAll('audio').forEach((item) => { if (item !== audio) item.pause(); });
        try { await audio.play(); } catch (_) { /* Browser may require a tap; the start button is still visible. */ }
    },
});

window.videoModal = () => ({
    visible: false,
    open() { this.visible = true; this.$nextTick(() => renderIcons()); },
    close() {
        this.visible = false;
        this.$refs.video?.pause?.();
    },
});

Alpine.start();

document.addEventListener('DOMContentLoaded', renderIcons);
document.addEventListener('alpine:initialized', renderIcons);
