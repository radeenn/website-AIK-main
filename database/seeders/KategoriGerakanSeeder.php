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
                    'deskripsi' => 'Panduan formal dengan keterangan lengkap, bacaan Arab, latin, terjemahan, dan audio MP3.',
                    'warna' => '#0F766E',
                ]
            );

            $child = Kategori::query()->updateOrCreate(
                ['slug' => 'anak-anak'],
                [
                    'nama' => 'Anak-anak',
                    'deskripsi' => 'Panduan lebih ringan dengan bahasa sederhana, ilustrasi ramah anak, dan audio MP3.',
                    'warna' => '#2563EB',
                ]
            );

            $movements = [
                [
                    'name' => 'Berdiri Tegak Menghadap Kiblat',
                    'adult' => 'Berdiri tegak menghadap kiblat dengan tenang. Niat dilakukan di dalam hati sebelum memulai sholat.',
                    'child' => 'Berdiri tegak menghadap kiblat. Tenangkan badan dan niatkan sholat di dalam hati.',
                    'readings' => [],
                ],
                [
                    'name' => 'Takbiratul Ihram',
                    'adult' => 'Angkat kedua tangan sejajar bahu atau telinga, lalu ucapkan takbir sebagai tanda memulai sholat.',
                    'child' => 'Angkat kedua tangan, lalu ucapkan takbir dengan tenang.',
                    'readings' => [[
                        'title' => 'Takbir',
                        'arab' => 'اللّٰهُ أَكْبَرُ',
                        'latin' => 'Allāhu akbar.',
                        'translation' => 'Allah Maha Besar.',
                        'short' => 'Allah Maha Besar.',
                        'audio' => 'audios/takbir_allahu_akbar.mp3',
                    ]],
                ],
                [
                    'name' => 'Bersedekap',
                    'adult' => 'Letakkan tangan kanan di atas tangan kiri, lalu baca doa pembuka secara tartil dan tidak tergesa-gesa.',
                    'child' => 'Letakkan tangan kanan di atas tangan kiri, lalu baca doa pembuka pelan-pelan.',
                    'readings' => [[
                        'title' => 'Doa Iftitah',
                        'arab' => 'سُبْحَانَكَ اللّٰهُمَّ وَبِحَمْدِكَ، وَتَبَارَكَ اسْمُكَ، وَتَعَالَى جَدُّكَ، وَلَا إِلٰهَ غَيْرُكَ',
                        'latin' => 'Subḥānaka allāhumma wa biḥamdika, wa tabārakasmuka, wa ta‘ālā jadduka, wa lā ilāha ghairuka.',
                        'translation' => 'Mahasuci Engkau ya Allah dan segala puji bagi-Mu. Mahaberkah nama-Mu, Mahatinggi kemuliaan-Mu, dan tidak ada Tuhan selain Engkau.',
                        'short' => 'Memuji dan mengagungkan Allah sebelum membaca Al-Fatihah.',
                        'audio' => 'audios/doa_iftitah.mp3',
                    ]],
                ],
                [
                    'name' => 'Berdiri Membaca Al-Fatihah',
                    'adult' => 'Baca surat Al-Fatihah dengan tenang, lalu dapat dilanjutkan dengan surat atau ayat Al-Qur’an.',
                    'child' => 'Baca Al-Fatihah sambil berdiri tenang, lalu lanjutkan surat pendek.',
                    'readings' => [[
                        'title' => 'Surat Al-Fatihah',
                        'arab' => 'بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ. اَلْحَمْدُ لِلّٰهِ رَبِّ الْعٰلَمِيْنَ. الرَّحْمٰنِ الرَّحِيْمِ. مٰلِكِ يَوْمِ الدِّيْنِ. اِيَّاكَ نَعْبُدُ وَاِيَّاكَ نَسْتَعِيْنُ. اِهْدِنَا الصِّرَاطَ الْمُسْتَقِيْمَ. صِرَاطَ الَّذِيْنَ اَنْعَمْتَ عَلَيْهِمْ غَيْرِ الْمَغْضُوْبِ عَلَيْهِمْ وَلَا الضَّاۤلِّيْنَ',
                        'latin' => 'Bismillāhir-raḥmānir-raḥīm. Alḥamdu lillāhi rabbil ‘ālamīn. Ar-raḥmānir-raḥīm. Māliki yaumid-dīn. Iyyāka na‘budu wa iyyāka nasta‘īn. Ihdinaṣ-ṣirāṭal-mustaqīm. Ṣirāṭallażīna an‘amta ‘alaihim, gairil-magḍūbi ‘alaihim wa laḍ-ḍāllīn.',
                        'translation' => 'Dengan nama Allah Yang Maha Pengasih lagi Maha Penyayang. Segala puji bagi Allah, Tuhan seluruh alam, Yang Maha Pengasih lagi Maha Penyayang, Pemilik hari pembalasan. Hanya kepada Engkaulah kami menyembah dan hanya kepada Engkaulah kami memohon pertolongan. Tunjukilah kami jalan yang lurus, jalan orang-orang yang telah Engkau beri nikmat, bukan jalan mereka yang dimurkai dan bukan pula jalan mereka yang sesat.',
                        'short' => 'Memohon petunjuk kepada Allah agar tetap berada di jalan yang lurus.',
                        'audio' => 'audios/001_Al-Fatihah.mp3',
                    ], [
                        'title' => 'Contoh Surat Pendek: Al-Ikhlas',
                        'arab' => 'قُلْ هُوَ اللّٰهُ أَحَدٌ. اَللّٰهُ الصَّمَدُ. لَمْ يَلِدْ وَلَمْ يُوْلَدْ. وَلَمْ يَكُنْ لَّهُ كُفُوًا أَحَدٌ',
                        'latin' => 'Qul huwallāhu aḥad. Allāhuṣ-ṣamad. Lam yalid wa lam yūlad. Wa lam yakun lahū kufuwan aḥad.',
                        'translation' => 'Katakanlah: Dialah Allah Yang Maha Esa. Allah tempat meminta segala sesuatu. Dia tidak beranak dan tidak pula diperanakkan. Tidak ada sesuatu pun yang setara dengan-Nya.',
                        'short' => 'Allah Maha Esa dan tempat meminta pertolongan.',
                        'audio' => 'audios/112AlIkhlas.mp3',
                    ]],
                ],
                [
                    'name' => 'Rukuk',
                    'adult' => 'Bungkukkan badan dengan punggung rata, kedua tangan memegang lutut, lalu baca tasbih rukuk.',
                    'child' => 'Bungkukkan badan, pegang lutut, lalu baca tasbih rukuk.',
                    'readings' => [[
                        'title' => 'Bacaan Rukuk',
                        'arab' => 'سُبْحَانَ رَبِّيَ الْعَظِيْمِ',
                        'latin' => 'Subḥāna rabbiyal ‘aẓīm.',
                        'translation' => 'Mahasuci Tuhanku Yang Maha Agung.',
                        'short' => 'Mahasuci Allah Yang Maha Agung.',
                        'audio' => 'audios/rukuk.mp3',
                    ]],
                ],
                [
                    'name' => "I'tidal",
                    'adult' => 'Bangkit dari rukuk hingga berdiri tegak kembali, lalu baca doa i’tidal dengan tenang.',
                    'child' => 'Bangun dari rukuk sampai berdiri tegak lagi.',
                    'readings' => [[
                        'title' => "Bacaan I'tidal",
                        'arab' => 'سَمِعَ اللّٰهُ لِمَنْ حَمِدَهُ. رَبَّنَا وَلَكَ الْحَمْدُ',
                        'latin' => 'Sami‘allāhu liman ḥamidah. Rabbanā wa lakal-ḥamdu.',
                        'translation' => 'Allah mendengar orang yang memuji-Nya. Ya Tuhan kami, bagi-Mu segala puji.',
                        'short' => 'Allah mendengar hamba yang memuji-Nya.',
                        'audio' => 'audios/itidal.mp3',
                    ]],
                ],
                [
                    'name' => 'Sujud Pertama',
                    'adult' => 'Turun untuk sujud. Letakkan dahi, hidung, kedua telapak tangan, lutut, dan ujung kaki pada tempat sujud.',
                    'child' => 'Sujud dengan meletakkan dahi, tangan, lutut, dan ujung kaki.',
                    'readings' => [[
                        'title' => 'Bacaan Sujud',
                        'arab' => 'سُبْحَانَ رَبِّيَ الْأَعْلَى',
                        'latin' => 'Subḥāna rabbiyal a‘lā.',
                        'translation' => 'Mahasuci Tuhanku Yang Mahatinggi.',
                        'short' => 'Mahasuci Allah Yang Mahatinggi.',
                        'audio' => 'audios/sujud.mp3',
                    ]],
                ],
                [
                    'name' => 'Duduk di Antara Dua Sujud',
                    'adult' => 'Duduk dengan tenang di antara dua sujud, kemudian baca doa memohon ampunan dan rahmat.',
                    'child' => 'Duduk sebentar di antara dua sujud, lalu baca doa.',
                    'readings' => [[
                        'title' => 'Doa di Antara Dua Sujud',
                        'arab' => 'رَبِّ اغْفِرْ لِيْ، وَارْحَمْنِيْ، وَاجْبُرْنِيْ، وَارْفَعْنِيْ، وَارْزُقْنِيْ، وَاهْدِنِيْ، وَعَافِنِيْ، وَاعْفُ عَنِّيْ',
                        'latin' => 'Rabbighfir lī, warḥamnī, wajburnī, warfa‘nī, warzuqnī, wahdinī, wa ‘āfinī, wa‘fu ‘annī.',
                        'translation' => 'Ya Tuhanku, ampunilah aku, rahmatilah aku, cukupilah aku, angkatlah derajatku, berilah aku rezeki, berilah aku petunjuk, sehatkanlah aku, dan maafkanlah aku.',
                        'short' => 'Memohon ampunan, rahmat, rezeki, petunjuk, kesehatan, dan maaf.',
                        'audio' => 'audios/duduk_antara_dua_sujud.mp3',
                    ]],
                ],
                [
                    'name' => 'Sujud Kedua',
                    'adult' => 'Lakukan sujud kedua seperti sujud pertama. Jaga posisi anggota sujud tetap benar.',
                    'child' => 'Sujud kedua dilakukan seperti sujud pertama.',
                    'readings' => [[
                        'title' => 'Bacaan Sujud Kedua',
                        'arab' => 'سُبْحَانَ رَبِّيَ الْأَعْلَى',
                        'latin' => 'Subḥāna rabbiyal a‘lā.',
                        'translation' => 'Mahasuci Tuhanku Yang Mahatinggi.',
                        'short' => 'Mahasuci Allah Yang Mahatinggi.',
                        'audio' => 'audios/sujud.mp3',
                    ]],
                ],
                [
                    'name' => 'Berdiri ke Rakaat Berikutnya',
                    'adult' => 'Bangkit dari sujud untuk melanjutkan rakaat berikutnya. Lakukan perpindahan dengan tertib dan tidak tergesa-gesa.',
                    'child' => 'Bangun kembali untuk melanjutkan rakaat berikutnya.',
                    'readings' => [],
                ],
                [
                    'name' => 'Tasyahud Awal',
                    'adult' => 'Duduk tasyahud awal dengan tenang. Letakkan tangan di atas paha, lalu baca tahiyat.',
                    'child' => 'Duduk tasyahud awal, tangan di atas paha, lalu baca tahiyat.',
                    'readings' => [[
                        'title' => 'Bacaan Tasyahud Awal',
                        'arab' => 'اَلتَّحِيَّاتُ لِلّٰهِ وَالصَّلَوَاتُ وَالطَّيِّبَاتُ. اَلسَّلَامُ عَلَيْكَ أَيُّهَا النَّبِيُّ وَرَحْمَةُ اللّٰهِ وَبَرَكَاتُهُ. اَلسَّلَامُ عَلَيْنَا وَعَلَى عِبَادِ اللّٰهِ الصَّالِحِيْنَ. أَشْهَدُ أَنْ لَا إِلٰهَ إِلَّا اللّٰهُ، وَأَشْهَدُ أَنَّ مُحَمَّدًا رَسُوْلُ اللّٰهِ',
                        'latin' => 'At-taḥiyyātu lillāhi waṣ-ṣalawātu waṭ-ṭayyibātu. As-salāmu ‘alaika ayyuhan-nabiyyu wa raḥmatullāhi wa barakātuh. As-salāmu ‘alainā wa ‘alā ‘ibādillāhiṣ-ṣāliḥīn. Asyhadu an lā ilāha illallāh, wa asyhadu anna Muḥammadan rasūlullāh.',
                        'translation' => 'Segala penghormatan, shalawat, dan kebaikan adalah milik Allah. Semoga keselamatan, rahmat Allah, dan berkah-Nya tercurah kepadamu wahai Nabi. Semoga keselamatan tercurah kepada kami dan kepada hamba-hamba Allah yang saleh. Aku bersaksi bahwa tidak ada Tuhan selain Allah, dan aku bersaksi bahwa Muhammad adalah utusan Allah.',
                        'short' => 'Membaca tahiyat dan dua kalimat syahadat.',
                        'audio' => 'audios/bacaan-tasyawud-awal.mp3',
                    ]],
                ],
                [
                    'name' => 'Tasyahud Akhir',
                    'adult' => 'Duduk tasyahud akhir, baca tahiyat, syahadat, dan shalawat kepada Nabi Muhammad ﷺ.',
                    'child' => 'Duduk tasyahud akhir, baca tahiyat dan shalawat.',
                    'readings' => [[
                        'title' => 'Bacaan Tasyahud Akhir dan Shalawat',
                        'arab' => 'اَللّٰهُمَّ صَلِّ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا صَلَّيْتَ عَلَى إِبْرَاهِيْمَ وَعَلَى آلِ إِبْرَاهِيْمَ، إِنَّكَ حَمِيْدٌ مَجِيْدٌ. اَللّٰهُمَّ بَارِكْ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا بَارَكْتَ عَلَى إِبْرَاهِيْمَ وَعَلَى آلِ إِبْرَاهِيْمَ، إِنَّكَ حَمِيْدٌ مَجِيْدٌ',
                        'latin' => 'Allāhumma ṣalli ‘alā Muḥammad wa ‘alā āli Muḥammad, kamā ṣallaita ‘alā Ibrāhīm wa ‘alā āli Ibrāhīm, innaka ḥamīdum majīd. Allāhumma bārik ‘alā Muḥammad wa ‘alā āli Muḥammad, kamā bārakta ‘alā Ibrāhīm wa ‘alā āli Ibrāhīm, innaka ḥamīdum majīd.',
                        'translation' => 'Ya Allah, limpahkanlah shalawat kepada Muhammad dan keluarga Muhammad sebagaimana Engkau telah melimpahkan shalawat kepada Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Mahamulia. Ya Allah, berikanlah berkah kepada Muhammad dan keluarga Muhammad sebagaimana Engkau telah memberikan berkah kepada Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Mahamulia.',
                        'short' => 'Membaca shalawat kepada Nabi Muhammad ﷺ.',
                        'audio' => 'audios/bacaan-tasyawud_akhir.mp3',
                    ]],
                ],
                [
                    'name' => 'Salam',
                    'adult' => 'Akhiri sholat dengan salam ke kanan dan ke kiri secara tertib.',
                    'child' => 'Akhiri sholat dengan salam ke kanan dan ke kiri.',
                    'readings' => [[
                        'title' => 'Bacaan Salam',
                        'arab' => 'اَلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ',
                        'latin' => 'Assalāmu ‘alaikum wa raḥmatullāh.',
                        'translation' => 'Semoga keselamatan dan rahmat Allah tercurah kepada kalian.',
                        'short' => 'Semoga keselamatan dan rahmat Allah tercurah.',
                        'audio' => 'audios/salam.mp3',
                    ]],
                ],
            ];

            foreach ([$adult, $child] as $category) {
                foreach ($movements as $index => $data) {
                    $order = $index + 1;
                    $baseSlug = Str::slug($data['name']);
                    $slug = $category->slug === 'dewasa' ? $baseSlug : $baseSlug.'-anak';

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

                    Bacaan::query()->where('gerakan_id', $movement->id)->delete();

                    foreach ($data['readings'] as $readingIndex => $reading) {
                        Bacaan::query()->create([
                            'gerakan_id' => $movement->id,
                            'urutan' => $readingIndex + 1,
                            'judul' => $reading['title'],
                            'teks_arab' => $reading['arab'],
                            'teks_latin' => $reading['latin'],
                            'terjemahan' => $reading['translation'],
                            'terjemahan_ringkas' => $reading['short'],
                            'audio_url' => $reading['audio'],
                            'sumber' => 'Himpunan Putusan Tarjih Muhammadiyah (Kitab Shalat).',
                        ]);
                    }
                }
            }
        });
    }
}
