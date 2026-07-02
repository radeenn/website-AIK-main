<?php

namespace Database\Seeders;

use App\Models\Bacaan;
use App\Models\Gerakan;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriGerakanSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function (): void {
            $adult = Kategori::query()->updateOrCreate(
                ['slug' => 'dewasa'],
                [
                    'nama' => 'Dewasa',
                    'deskripsi' => 'Panduan sholat dengan foto gerakan orang dewasa, bacaan Arab, latin, arti, dan audio.',
                    'warna' => '#087A5B',
                ]
            );

            $child = Kategori::query()->updateOrCreate(
                ['slug' => 'anak-anak'],
                [
                    'nama' => 'Anak-anak',
                    'deskripsi' => 'Panduan sholat dengan ilustrasi anak, bahasa lebih sederhana, bacaan Arab, latin, arti, dan audio.',
                    'warna' => '#4A9FD8',
                ]
            );

            $movements = [
                [
                    'name' => 'Berdiri Tegak Menghadap Kiblat',
                    'adult' => 'Berdiri tegak menghadap kiblat dengan tenang. Niat dilakukan di dalam hati sebelum memulai sholat.',
                    'child' => 'Berdiri tegak menghadap kiblat. Tenangkan badan dan niatkan sholat di dalam hati.',
                    'reading' => [
                        'title' => 'Niat dalam Hati',
                        'arab' => 'النِّيَّةُ فِي القَلْبِ',
                        'latin' => 'An-niyyatu fil qalbi.',
                        'translation' => 'Niat dilakukan di dalam hati.',
                        'short' => 'Niatkan sholat di dalam hati.',
                        'audio' => 'النِّيَّةُ فِي القَلْبِ',
                    ],
                ],
                [
                    'name' => 'Takbiratul Ihram',
                    'adult' => 'Angkat kedua tangan sejajar bahu atau telinga, lalu ucapkan takbir sebagai tanda memulai sholat.',
                    'child' => 'Angkat kedua tangan, lalu ucapkan takbir dengan tenang.',
                    'reading' => [
                        'title' => 'Takbir',
                        'arab' => 'اللّٰهُ أَكْبَرُ',
                        'latin' => 'Allaahu akbar.',
                        'translation' => 'Allah Maha Besar.',
                        'short' => 'Allah Maha Besar.',
                        'audio' => 'اللّٰهُ أَكْبَرُ',
                    ],
                ],
                [
                    'name' => 'Bersedekap',
                    'adult' => 'Letakkan tangan kanan di atas tangan kiri, lalu baca doa pembuka secara tartil dan tidak tergesa-gesa.',
                    'child' => 'Letakkan tangan kanan di atas tangan kiri, lalu baca doa pembuka pelan-pelan.',
                    'reading' => [
                        'title' => 'Doa Iftitah',
                        'arab' => 'سُبْحَانَكَ اللّٰهُمَّ وَبِحَمْدِكَ، وَتَبَارَكَ اسْمُكَ، وَتَعَالَى جَدُّكَ، وَلَا إِلٰهَ غَيْرُكَ',
                        'latin' => 'Subhaanaka allaahumma wa bihamdika, wa tabaarakasmuka, wa ta’aalaa jadduka, wa laa ilaaha ghairuka.',
                        'translation' => 'Mahasuci Engkau ya Allah dan segala puji bagi-Mu. Mahaberkah nama-Mu, Mahatinggi kemuliaan-Mu, dan tidak ada Tuhan selain Engkau.',
                        'short' => 'Memuji dan mengagungkan Allah sebelum membaca Al-Fatihah.',
                        'audio' => 'سُبْحَانَكَ اللّٰهُمَّ وَبِحَمْدِكَ',
                    ],
                ],
                [
                    'name' => 'Berdiri Membaca Al-Fatihah',
                    'adult' => 'Baca surat Al-Fatihah dengan tenang. Usahakan memperhatikan makna bacaan dan menjaga posisi berdiri.',
                    'child' => 'Baca Al-Fatihah sambil berdiri tenang.',
                    'reading' => [
                        'title' => 'Surat Al-Fatihah',
                        'arab' => 'بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ. اَلْحَمْدُ لِلّٰهِ رَبِّ الْعٰلَمِيْنَ. الرَّحْمٰنِ الرَّحِيْمِ. مٰلِكِ يَوْمِ الدِّيْنِ. اِيَّاكَ نَعْبُدُ وَاِيَّاكَ نَسْتَعِيْنُ. اِهْدِنَا الصِّرَاطَ الْمُسْتَقِيْمَ. صِرَاطَ الَّذِيْنَ اَنْعَمْتَ عَلَيْهِمْ غَيْرِ الْمَغْضُوْبِ عَلَيْهِمْ وَلَا الضَّاۤلِّيْنَ',
                        'latin' => 'Bismillaahir rahmaanir rahiim. Alhamdu lillaahi rabbil ‘aalamiin. Ar-rahmaanir rahiim. Maaliki yaumid diin. Iyyaaka na’budu wa iyyaaka nasta’iin. Ihdinash shiraathal mustaqiim. Shiraathal ladziina an’amta ‘alaihim ghairil maghdhuubi ‘alaihim wa ladh-dhaalliin.',
                        'translation' => 'Dengan nama Allah Yang Maha Pengasih lagi Maha Penyayang. Segala puji bagi Allah, Tuhan seluruh alam. Yang Maha Pengasih lagi Maha Penyayang. Pemilik hari pembalasan. Hanya kepada-Mu kami menyembah dan hanya kepada-Mu kami memohon pertolongan. Tunjukilah kami jalan yang lurus, yaitu jalan orang-orang yang Engkau beri nikmat, bukan jalan mereka yang dimurkai dan bukan pula jalan mereka yang sesat.',
                        'short' => 'Memohon petunjuk kepada Allah agar tetap berada di jalan yang benar.',
                        'audio' => 'اَلْحَمْدُ لِلّٰهِ رَبِّ الْعٰلَمِيْنَ',
                    ],
                ],
                [
                    'name' => 'Rukuk',
                    'adult' => 'Bungkukkan badan dengan punggung rata, kedua tangan memegang lutut, lalu baca tasbih rukuk.',
                    'child' => 'Bungkukkan badan, pegang lutut, lalu baca tasbih rukuk.',
                    'reading' => [
                        'title' => 'Bacaan Rukuk',
                        'arab' => 'سُبْحَانَ رَبِّيَ الْعَظِيْمِ',
                        'latin' => 'Subhaana rabbiyal ‘azhiimi.',
                        'translation' => 'Mahasuci Tuhanku Yang Maha Agung.',
                        'short' => 'Mahasuci Allah Yang Maha Agung.',
                        'audio' => 'سُبْحَانَ رَبِّيَ الْعَظِيْمِ',
                    ],
                ],
                [
                    'name' => "I'tidal",
                    'adult' => 'Bangkit dari rukuk hingga berdiri tegak kembali, lalu baca doa i’tidal dengan tenang.',
                    'child' => 'Bangun dari rukuk sampai berdiri tegak lagi.',
                    'reading' => [
                        'title' => "Bacaan I'tidal",
                        'arab' => 'سَمِعَ اللّٰهُ لِمَنْ حَمِدَهُ. رَبَّنَا وَلَكَ الْحَمْدُ',
                        'latin' => 'Sami‘allaahu liman hamidah. Rabbanaa wa lakal hamdu.',
                        'translation' => 'Allah mendengar orang yang memuji-Nya. Ya Tuhan kami, bagi-Mu segala puji.',
                        'short' => 'Allah mendengar hamba yang memuji-Nya.',
                        'audio' => 'سَمِعَ اللّٰهُ لِمَنْ حَمِدَهُ',
                    ],
                ],
                [
                    'name' => 'Sujud Pertama',
                    'adult' => 'Turun untuk sujud. Letakkan dahi, hidung, kedua telapak tangan, lutut, dan ujung kaki pada tempat sujud.',
                    'child' => 'Sujud dengan meletakkan dahi, tangan, lutut, dan ujung kaki.',
                    'reading' => [
                        'title' => 'Bacaan Sujud',
                        'arab' => 'سُبْحَانَ رَبِّيَ الْأَعْلَى',
                        'latin' => 'Subhaana rabbiyal a‘laa.',
                        'translation' => 'Mahasuci Tuhanku Yang Mahatinggi.',
                        'short' => 'Mahasuci Allah Yang Mahatinggi.',
                        'audio' => 'سُبْحَانَ رَبِّيَ الْأَعْلَى',
                    ],
                ],
                [
                    'name' => 'Duduk di Antara Dua Sujud',
                    'adult' => 'Duduk dengan tenang di antara dua sujud, kemudian baca doa memohon ampunan dan rahmat.',
                    'child' => 'Duduk sebentar di antara dua sujud, lalu baca doa.',
                    'reading' => [
                        'title' => 'Doa di Antara Dua Sujud',
                        'arab' => 'رَبِّ اغْفِرْ لِيْ، وَارْحَمْنِيْ، وَاجْبُرْنِيْ، وَارْفَعْنِيْ، وَارْزُقْنِيْ، وَاهْدِنِيْ، وَعَافِنِيْ، وَاعْفُ عَنِّيْ',
                        'latin' => 'Rabbighfir lii, warhamnii, wajburnii, warfa‘nii, warzuqnii, wahdinii, wa ‘aafinii, wa‘fu ‘annii.',
                        'translation' => 'Ya Tuhanku, ampunilah aku, rahmatilah aku, cukupilah aku, angkatlah derajatku, berilah aku rezeki, berilah aku petunjuk, sehatkanlah aku, dan maafkanlah aku.',
                        'short' => 'Memohon ampunan, rahmat, rezeki, petunjuk, kesehatan, dan maaf dari Allah.',
                        'audio' => 'رَبِّ اغْفِرْ لِيْ وَارْحَمْنِيْ',
                    ],
                ],
                [
                    'name' => 'Sujud Kedua',
                    'adult' => 'Lakukan sujud kedua seperti sujud pertama. Jaga posisi anggota sujud tetap benar.',
                    'child' => 'Sujud kedua dilakukan seperti sujud pertama.',
                    'reading' => [
                        'title' => 'Bacaan Sujud Kedua',
                        'arab' => 'سُبْحَانَ رَبِّيَ الْأَعْلَى',
                        'latin' => 'Subhaana rabbiyal a‘laa.',
                        'translation' => 'Mahasuci Tuhanku Yang Mahatinggi.',
                        'short' => 'Mahasuci Allah Yang Mahatinggi.',
                        'audio' => 'سُبْحَانَ رَبِّيَ الْأَعْلَى',
                    ],
                ],
                [
                    'name' => 'Berdiri ke Rakaat Berikutnya',
                    'adult' => 'Bangkit dari sujud untuk melanjutkan rakaat berikutnya. Lakukan perpindahan dengan tertib dan tidak tergesa-gesa.',
                    'child' => 'Bangun kembali untuk melanjutkan rakaat berikutnya.',
                    'reading' => [
                        'title' => 'Takbir Perpindahan',
                        'arab' => 'اللّٰهُ أَكْبَرُ',
                        'latin' => 'Allaahu akbar.',
                        'translation' => 'Allah Maha Besar.',
                        'short' => 'Allah Maha Besar.',
                        'audio' => 'اللّٰهُ أَكْبَرُ',
                    ],
                ],
                [
                    'name' => 'Tasyahud Awal',
                    'adult' => 'Duduk tasyahud awal dengan tenang. Letakkan tangan di atas paha, lalu baca tahiyat.',
                    'child' => 'Duduk tasyahud awal, tangan di atas paha, lalu baca tahiyat.',
                    'reading' => [
                        'title' => 'Bacaan Tasyahud Awal',
                        'arab' => 'اَلتَّحِيَّاتُ لِلّٰهِ وَالصَّلَوَاتُ وَالطَّيِّبَاتُ. اَلسَّلَامُ عَلَيْكَ أَيُّهَا النَّبِيُّ وَرَحْمَةُ اللّٰهِ وَبَرَكَاتُهُ. اَلسَّلَامُ عَلَيْنَا وَعَلَى عِبَادِ اللّٰهِ الصَّالِحِيْنَ. أَشْهَدُ أَنْ لَا إِلٰهَ إِلَّا اللّٰهُ، وَأَشْهَدُ أَنَّ مُحَمَّدًا رَسُوْلُ اللّٰهِ',
                        'latin' => 'At-tahiyyaatu lillaahi wash-shalawaatu wath-thayyibaatu. Assalaamu ‘alaika ayyuhan nabiyyu wa rahmatullaahi wa barakaatuh. Assalaamu ‘alainaa wa ‘alaa ‘ibaadillaahish shaalihiin. Asyhadu an laa ilaaha illallaah, wa asyhadu anna Muhammadan rasuulullaah.',
                        'translation' => 'Segala penghormatan, shalawat, dan kebaikan adalah milik Allah. Semoga keselamatan, rahmat Allah, dan berkah-Nya tercurah kepadamu wahai Nabi. Semoga keselamatan tercurah kepada kami dan kepada hamba-hamba Allah yang saleh. Aku bersaksi bahwa tidak ada Tuhan selain Allah, dan aku bersaksi bahwa Muhammad adalah utusan Allah.',
                        'short' => 'Membaca tahiyat dan dua kalimat syahadat.',
                        'audio' => 'اَلتَّحِيَّاتُ لِلّٰهِ وَالصَّلَوَاتُ وَالطَّيِّبَاتُ',
                    ],
                ],
                [
                    'name' => 'Tasyahud Akhir',
                    'adult' => 'Duduk tasyahud akhir, baca tahiyat, syahadat, dan shalawat kepada Nabi Muhammad ﷺ.',
                    'child' => 'Duduk tasyahud akhir, baca tahiyat dan shalawat.',
                    'reading' => [
                        'title' => 'Bacaan Tasyahud Akhir dan Shalawat',
                        'arab' => 'اَللّٰهُمَّ صَلِّ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا صَلَّيْتَ عَلَى إِبْرَاهِيْمَ وَعَلَى آلِ إِبْرَاهِيْمَ، إِنَّكَ حَمِيْدٌ مَجِيْدٌ. اَللّٰهُمَّ بَارِكْ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا بَارَكْتَ عَلَى إِبْرَاهِيْمَ وَعَلَى آلِ إِبْرَاهِيْمَ، إِنَّكَ حَمِيْدٌ مَجِيْدٌ',
                        'latin' => 'Allaahumma shalli ‘alaa Muhammad wa ‘alaa aali Muhammad, kamaa shallaita ‘alaa Ibraahiim wa ‘alaa aali Ibraahiim, innaka hamiidum majiid. Allaahumma baarik ‘alaa Muhammad wa ‘alaa aali Muhammad, kamaa baarakta ‘alaa Ibraahiim wa ‘alaa aali Ibraahiim, innaka hamiidum majiid.',
                        'translation' => 'Ya Allah, limpahkanlah shalawat kepada Muhammad dan keluarga Muhammad sebagaimana Engkau telah melimpahkan shalawat kepada Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Mahamulia. Ya Allah, berikanlah berkah kepada Muhammad dan keluarga Muhammad sebagaimana Engkau telah memberikan berkah kepada Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Mahamulia.',
                        'short' => 'Membaca shalawat kepada Nabi Muhammad ﷺ.',
                        'audio' => 'اَللّٰهُمَّ صَلِّ عَلَى مُحَمَّدٍ',
                    ],
                ],
                [
                    'name' => 'Salam',
                    'adult' => 'Akhiri sholat dengan salam ke kanan dan ke kiri secara tertib.',
                    'child' => 'Akhiri sholat dengan salam ke kanan dan ke kiri.',
                    'reading' => [
                        'title' => 'Bacaan Salam',
                        'arab' => 'اَلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ',
                        'latin' => 'Assalaamu ‘alaikum wa rahmatullaah.',
                        'translation' => 'Semoga keselamatan dan rahmat Allah tercurah kepada kalian.',
                        'short' => 'Semoga keselamatan dan rahmat Allah tercurah.',
                        'audio' => 'اَلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ',
                    ],
                ],
            ];

            foreach ([$adult, $child] as $category) {
                foreach ($movements as $index => $data) {
                    $order = $index + 1;
                    $baseSlug = Str::slug($data['name']);
                    $slug = $category->slug === 'dewasa' ? $baseSlug : $baseSlug.'-anak';
                    $reading = $data['reading'];

                    $movement = Gerakan::query()->updateOrCreate(
                        ['kategori_id' => $category->id, 'urutan' => $order],
                        [
                            'nama' => $data['name'],
                            'slug' => $slug,
                            'deskripsi' => $data['adult'],
                            'deskripsi_sederhana' => $data['child'],
                            'gambar_url' => sprintf('images/gerakan/%s/movement-%02d.webp', $category->slug, $order),
                            'video_url' => null,
                            'status_aktif' => true,
                        ]
                    );

                    Bacaan::query()->updateOrCreate(
                        ['gerakan_id' => $movement->id, 'urutan' => 1],
                        [
                            'judul' => $reading['title'],
                            'teks_arab' => $reading['arab'],
                            'teks_latin' => $reading['latin'],
                            'terjemahan' => $reading['translation'],
                            'terjemahan_ringkas' => $reading['short'],
                            'audio_url' => $this->googleTtsUrl($reading['audio']),
                            'sumber' => 'Materi bacaan sholat dasar. Sesuaikan kembali dengan HPT Muhammadiyah jika guru meminta redaksi khusus.',
                        ]
                    );
                }
            }
        });
    }

    private function googleTtsUrl(string $text): string
    {
        return 'https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=ar&q='.rawurlencode($text);
    }
}
