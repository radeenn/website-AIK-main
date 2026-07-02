import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;

const renderIcons = () => {
    requestAnimationFrame(() => createIcons({ icons }));
};

window.audioPlayer = () => ({
    playing: false,
    currentTime: 0,
    duration: 0,
    volume: 1,
    init() {
        const audio = this.$refs.audio;
        audio.addEventListener('loadedmetadata', () => { this.duration = Number.isFinite(audio.duration) ? audio.duration : 0; });
        audio.addEventListener('timeupdate', () => { this.currentTime = audio.currentTime; });
        audio.addEventListener('play', () => { this.playing = true; renderIcons(); });
        audio.addEventListener('pause', () => { this.playing = false; renderIcons(); });
        audio.addEventListener('ended', () => { this.playing = false; this.currentTime = 0; renderIcons(); });
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
    seek() { this.$refs.audio.currentTime = Number(this.currentTime || 0); },
    setVolume() { this.$refs.audio.volume = Number(this.volume); },
    format(value) {
        if (!Number.isFinite(value)) return '0:00';
        const minutes = Math.floor(value / 60);
        const seconds = Math.floor(value % 60).toString().padStart(2, '0');
        return `${minutes}:${seconds}`;
    },
});

window.mediaPreview = (initial = {}) => ({
    image: initial.image || null,
    video: initial.video || null,
    audio: initial.audio || null,
    externalVideo: Boolean(initial.video && /^https?:\/\//.test(initial.video)),
    replaceUrl(key, file) {
        if (this[key]?.startsWith?.('blob:')) URL.revokeObjectURL(this[key]);
        this[key] = file ? URL.createObjectURL(file) : null;
    },
    previewImage(event) { this.replaceUrl('image', event.target.files?.[0]); },
    previewVideo(event) { this.externalVideo = false; this.replaceUrl('video', event.target.files?.[0]); },
    previewAudio(event) { this.replaceUrl('audio', event.target.files?.[0]); },
});

Alpine.start();

document.addEventListener('DOMContentLoaded', renderIcons);
document.addEventListener('alpine:initialized', renderIcons);
