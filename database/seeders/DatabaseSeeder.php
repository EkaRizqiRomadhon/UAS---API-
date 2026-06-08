<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ── Admin / Demo User ──────────────────────────────────────────────────
        $admin = User::create([
            'name'     => 'Admin GoJatim',
            'email'    => 'admin@gojatim.id',
            'password' => Hash::make('password'),
            'role'     => 'admin',
            'phone'    => '081234567890',
        ]);

        User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@example.com',
            'password' => Hash::make('password'),
            'role'     => 'user',
            'phone'    => '082345678901',
        ]);

        // ── Categories ─────────────────────────────────────────────────────────
        $catAir    = Category::create(['name' => 'Wisata Air',      'slug' => 'wisata-air',      'description' => 'Destinasi pantai, sungai, dan air terjun']);
        $catAlam   = Category::create(['name' => 'Alam & Gunung',   'slug' => 'alam-gunung',     'description' => 'Pendakian, savana, dan puncak gunung']);
        $catSejarah= Category::create(['name' => 'Sejarah & Budaya','slug' => 'sejarah-budaya',  'description' => 'Candi, keraton, dan warisan budaya']);
        $catTrekking=Category::create(['name' => 'Trekking',        'slug' => 'trekking',        'description' => 'Jalur trekking menantang']);

        // ── Destinations ───────────────────────────────────────────────────────
        $dests = [
            Destination::create([
                'name'        => 'Goa Gong',
                'slug'        => 'goa-gong',
                'kabupaten'   => 'Pacitan',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Goa alam terbesar dan terindah di Asia Tenggara dengan stalaktit dan stalagmit memukau.',
                'image'       => 'images/goa gong.jpg',
            ]),
            Destination::create([
                'name'        => 'Kawah Ijen',
                'slug'        => 'kawah-ijen',
                'kabupaten'   => 'Banyuwangi',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Danau kawah berwarna toska dengan fenomena blue fire langka yang hanya bisa dilihat di dua tempat di dunia.',
                'image'       => 'images/Kawah-Ijen-Indonesia-Lake.jpg',
            ]),
            Destination::create([
                'name'        => 'Tumpak Sewu',
                'slug'        => 'tumpak-sewu',
                'kabupaten'   => 'Lumajang',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Air terjun terlebar di Jawa Timur dengan pemandangan tirai air yang spektakuler dari atas tebing.',
                'image'       => 'images/tumpak sewu.jpg',
            ]),
            Destination::create([
                'name'        => 'Pantai Klayar',
                'slug'        => 'pantai-klayar',
                'kabupaten'   => 'Pacitan',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Pantai eksotis dengan formasi karang unik dan fenomena seruling laut yang memukau.',
                'image'       => 'images/pantai-klayar-profile1653617226.jpeg',
            ]),
            Destination::create([
                'name'        => 'Puncak B29',
                'slug'        => 'puncak-b29',
                'kabupaten'   => 'Lumajang',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Negeri di atas awan dengan panorama Gunung Semeru dan Bromo dari ketinggian 2.900 mdpl.',
                'image'       => 'images/puncak b29.jpg',
            ]),
            Destination::create([
                'name'        => 'Pantai Watu Karung',
                'slug'        => 'pantai-watu-karung',
                'kabupaten'   => 'Pacitan',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Surga tersembunyi para peselancar dengan ombak konsisten dan air jernih kehijauan.',
                'image'       => 'images/destinations/Watu karung beach.jpg',
            ]),
            Destination::create([
                'name'        => 'Gunung Raung',
                'slug'        => 'gunung-raung',
                'kabupaten'   => 'Banyuwangi',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Puncak tertinggi di Jawa Timur bagian timur dengan kaldera raksasa yang menantang para pendaki berpengalaman.',
                'image'       => 'images/destinations/Gunung Raung.jpg',
            ]),
            Destination::create([
                'name'        => 'Bukit Teletubbies',
                'slug'        => 'bukit-teletubbies',
                'kabupaten'   => 'Probolinggo',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Hamparan savana hijau rolls Bromo yang terkenal dengan bukit-bukit bulat seperti tayangan Teletubbies.',
                'image'       => 'images/destinations/bukit teletubbies.jpg',
            ]),
            Destination::create([
                'name'        => 'Telaga Ngebel',
                'slug'        => 'telaga-ngebel',
                'kabupaten'   => 'Ponorogo',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Danau vulkanik alami di ketinggian 734 mdpl dikelilingi hutan pinus yang sejuk dan asri.',
                'image'       => 'images/destinations/Telaga Ngebel.jpg',
            ]),
            Destination::create([
                'name'        => 'Goa Lowo',
                'slug'        => 'goa-lowo',
                'kabupaten'   => 'Trenggalek',
                'provinsi'    => 'Jawa Timur',
                'description' => 'Goa terpanjang di Asia Tenggara dengan stalaktit dan stalagmit serta sungai bawah tanah.',
                'image'       => 'images/destinations/Gowa Lowo.webp',
            ]),
        ];

        // ── Tours ──────────────────────────────────────────────────────────────
        $tours = [
            Tour::create([
                'category_id'   => $catAir->id,
                'title'         => 'Trip 1 Hari: Pantai Watu Karung & Goa Lowo',
                'slug'          => 'trip-1-hari-watu-karung-goa-lowo',
                'description'   => 'Nikmati sehari penuh menjelajahi keindahan pantai tersembunyi Watu Karung dengan air jernih dan tebing tinggi, lalu lanjut ke Goa Lowo yang misterius dan menakjubkan.',
                'duration_days' => 1,
                'max_people'    => 12,
                'price'         => 350000,
                'rating'        => 4.8,
                'image'         => 'images/destinations/Watu karung beach.jpg',
                'is_active'     => true,
            ]),
            Tour::create([
                'category_id'   => $catTrekking->id,
                'title'         => 'Trip 2 Hari: Gunung Raung & Telaga Ngebel',
                'slug'          => 'trip-2-hari-gunung-raung-telaga-ngebel',
                'description'   => 'Dua hari petualangan epik: mendaki kawah raksasa Gunung Raung, lalu bersantai di Telaga Ngebel yang tenang dikelilingi hutan pinus nan sejuk.',
                'duration_days' => 2,
                'max_people'    => 10,
                'price'         => 850000,
                'rating'        => 4.9,
                'image'         => 'images/destinations/Gunung Raung.jpg',
                'is_active'     => true,
            ]),
            Tour::create([
                'category_id'   => $catAlam->id,
                'title'         => 'Trip 3 Hari: Air Terjun, Savana & Pantai',
                'slug'          => 'trip-3-hari-air-terjun-savana-pantai',
                'description'   => 'Tiga hari memanjakan diri: menyaksikan Tumpak Sewu dari tebing, merasakan dinginnya savana Bukit Teletubbies, dan berakhir di pesisir selatan Pacitan.',
                'duration_days' => 3,
                'max_people'    => 10,
                'price'         => 1200000,
                'rating'        => 4.7,
                'image'         => 'images/destinations/bukit teletubbies.jpg',
                'is_active'     => true,
            ]),
            Tour::create([
                'category_id'   => $catAlam->id,
                'title'         => 'Trip 4 Hari: Kawah Ijen & Alam Banyuwangi',
                'slug'          => 'trip-4-hari-kawah-ijen-banyuwangi',
                'description'   => 'Empat hari eksplorasi ujung timur Jawa: menyaksikan blue fire Kawah Ijen, menjelajahi hutan tropis Baluran, dan bersantai di pantai eksotis Pulau Merah.',
                'duration_days' => 4,
                'max_people'    => 8,
                'price'         => 1850000,
                'rating'        => 4.9,
                'image'         => 'images/Kawah-Ijen-Indonesia-Lake.jpg',
                'is_active'     => true,
            ]),
            Tour::create([
                'category_id'   => $catAlam->id,
                'title'         => 'Trip 5 Hari: Grand Tour Jawa Timur',
                'slug'          => 'trip-5-hari-grand-tour-jawa-timur',
                'description'   => 'Pengalaman lima hari menyeluruh: dari Kawah Ijen ke Tumpak Sewu, Puncak B29, Bromo, hingga Pacitan — semua dalam satu paket premium.',
                'duration_days' => 5,
                'max_people'    => 8,
                'price'         => 2500000,
                'rating'        => 5.0,
                'image'         => 'images/puncak b29.jpg',
                'is_active'     => true,
            ]),
        ];

        // Attach destinations to tours (pivot)
        $tours[0]->destinations()->attach([$dests[5]->id, $dests[9]->id]);  // Trip 1
        $tours[1]->destinations()->attach([$dests[6]->id, $dests[8]->id]);  // Trip 2
        $tours[2]->destinations()->attach([$dests[2]->id, $dests[7]->id, $dests[3]->id]); // Trip 3
        $tours[3]->destinations()->attach([$dests[1]->id]);                  // Trip 4
        $tours[4]->destinations()->attach([$dests[1]->id, $dests[2]->id, $dests[4]->id, $dests[3]->id]); // Trip 5

        // ── Blogs ──────────────────────────────────────────────────────────────
        Blog::create([
            'user_id'        => $admin->id,
            'destination_id' => $dests[3]->id,
            'title'          => 'Pantai Klayar Pacitan: Surga Tersembunyi dengan Seruling Laut yang Memukau',
            'slug'           => 'pantai-klayar-pacitan-surga-tersembunyi',
            'tag'            => 'Travel Tips',
            'excerpt'        => 'Tersembunyi di ujung barat Jawa Timur, Pantai Klayar menawarkan keindahan karang eksotis dan fenomena alam unik — seruling laut yang berbunyi saat ombak menghantam celah batu.',
            'body'           => '<p>Pantai Klayar berada di Kecamatan Donorojo, Kabupaten Pacitan, berjarak sekitar 35 km dari pusat kota. Untuk mencapainya, Anda harus melewati jalan berkelok-kelok melewati perbukitan yang indah. Perjalanan itu sendiri sudah menjadi pengalaman yang tak terlupakan.</p><p>Setibanya di sana, Anda akan disambut hamparan pasir putih bersih yang membentang luas. Di sisi kanan pantai, terdapat formasi karang besar yang menjadi ikon Pantai Klayar — dan di sinilah keajaiban terjadi. Saat ombak besar menghantam celah di antara batuan karang, air tersembur ke udara setinggi 10 meter disertai suara menyerupai seruling. Inilah yang disebut "seruling samudra", fenomena alam langka yang menjadi daya tarik utama pantai ini.</p>',
            'image'          => 'images/pantai-klayar-profile1653617226.jpeg',
            'published_at'   => now()->subDays(5),
            'is_published'   => true,
        ]);

        Blog::create([
            'user_id'        => $admin->id,
            'destination_id' => $dests[1]->id,
            'title'          => 'Blue Fire Kawah Ijen: Fenomena Langka yang Wajib Kamu Saksikan',
            'slug'           => 'blue-fire-kawah-ijen-fenomena-langka',
            'tag'            => 'Destinasi',
            'excerpt'        => 'Blue fire Kawah Ijen adalah fenomena alam berupa api berwarna biru yang hanya bisa ditemukan di dua tempat di seluruh dunia. Simak panduan lengkap cara menyaksikannya.',
            'body'           => '<p>Blue fire atau api biru Kawah Ijen terbentuk dari pembakaran gas sulfur dioksida yang keluar dari celah-celah kawah bersuhu tinggi. Gas ini terbakar dan menghasilkan nyala api biru yang memukau, hanya terlihat pada malam hari atau dini hari sebelum fajar.</p>',
            'image'          => 'images/Kawah-Ijen-Indonesia-Lake.jpg',
            'published_at'   => now()->subDays(10),
            'is_published'   => true,
        ]);

        Blog::create([
            'user_id'        => $admin->id,
            'destination_id' => $dests[2]->id,
            'title'          => 'Tumpak Sewu vs Niagara: Air Terjun Terlebar di Jawa Timur',
            'slug'           => 'tumpak-sewu-vs-niagara-air-terjun-terlebar',
            'tag'            => 'Destinasi',
            'excerpt'        => 'Dengan bentangan air selebar 120 meter dan tinggi 120 meter, Tumpak Sewu sering dijuluki "Niagara-nya Jawa". Temukan kenapa air terjun ini wajib masuk bucket list kamu.',
            'body'           => '<p>Tumpak Sewu atau dikenal juga sebagai Coban Sewu terletak di perbatasan Kabupaten Lumajang dan Malang. Nama "Sewu" dalam bahasa Jawa berarti seribu — menggambarkan tirai air yang seperti ribuan helai benang jatuh dari tebing setinggi 120 meter.</p>',
            'image'          => 'images/tumpak sewu.jpg',
            'published_at'   => now()->subDays(15),
            'is_published'   => true,
        ]);
    }
}
