<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CompanyProfile;
use App\Models\User;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@nik.com',
                'password' => bcrypt('adminnik123*'),
                'aktif' => 5,
            ], [
                'name' => 'User',
                'email' => 'user@nik.com',
                'password' => bcrypt('usernik123*'),
                'aktif' => 1,
            ],
        ];

        User::insert($users);

        $companyProfiles = [
            [
                'title' => 'PENYEDIA PERANGKAT TELEKOMUNIKASI SATELIT DAN NAVIGASI LAUT',
                'subtitle' => 'Lorem ipsum dolor sit amet consectetur. Venenatis tortor quam sollicitudin nulla amet id faucibus.',
                'subsubtitle' => 'Lorem ipsum dolor sit amet consectetur.',
                'title_layanan' => 'LAYANAN SATELIT STATION',
                'description_layanan' => 'Lorem ipsum dolor sit amet consectetur. Aliquam et ut risus amet tortor nulla. Consectetur nisl quam purus in. Mauris lectus dolor morbi potenti quam dictum. Odio lorem sed lectus volutpat tincidunt eget nisl egestas cursus. Egestas maecenas interdum egestas tellus rhoncus at pretium sit suspendisse.',
                'description' => 'Perusahaan kami berpengalaman menyediakan solusi dan perangkat dibidang telekomunikasi satelit dan navigasi laut dengan membawa beberapa merek ternama. Sebagai distributor resmi dari Thuraya, KODEN, dan beberapa brand lainnya, kami memastikan bahwa setiap produk yang kami jual adalah produk asli dan berkualitas tinggi. Kami percaya bahwa komunikasi adalah hal yang sangat penting dalam kehidupan kita, terutama di lingkungan yang terpencil atau tidak terjangkau oleh jaringan seluler. Kami berkomitmen untuk memberikan layanan terbaik kepada pelanggan kami dengan menyediakan produk yang terbaik, harga yang kompetitif, dan layanan pelanggan yang memuaskan. Tim kami terdiri dari orang-orang yang berpengalaman dan berdedikasi dalam bidang telekomunikasi, dan kami akan dengan senang hati membantu Anda dalam memilih produk yang paling sesuai dengan kebutuhan Anda.',
                'visi' => 'Menjadi pemimpin terkemuka dalam layanan konektivitas satelit dan alat navigasi kapal, menjadi pilihan utama pelanggan untuk solusi komunikasi dan navigasi yang handal dan inovatif di Indonesia.',
                'misi1' => 'GOOD SOLUTION',
                'misi2' => 'CUSTOMER FIRST',
                'misi3' => 'SUSTAINABLE DEVELOPMENT',
                'misi4' => 'LOCAL MARKET LEADER',
                'misi5' => 'PARTNERSHIP',
                'address' => 'Gedung Graha KSA, Jl. Jelawat, Sidomulyo, Kec. Samarinda Ilir, Kota Samarinda, Kalimantan Timur 75115.',
                'email' => 'info@satstation.co.id',
                'email2' => 'sales@satstation.co.id',
                'wa' => '085213127513',
                'instagram' => 'https://www.instagram.com/sat_station/',
                'facebook' => 'https://www.facebook.com/profile.php?id=61556025369519',
                'tokopedia' => 'https://www.tokopedia.com/satellite-station',
                'linkedin' => 'www.linkedin.com/in/sat-station-144622310',
            ],
        ];

        CompanyProfile::insert($companyProfiles);

        $layanans = [
            [
                'category' => 'Navigasi & Radio',
                'title' => 'PENYEDIA ALAT NAVIGASI MARITIM',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima quibusdam soluta illo!',
                'file' => 'kapal.png',
            ], [
                'category' => 'Internet Satelit & Telepon Satelit',
                'title' => 'PEYEDIA LAYANAN KOMUNIKASI SATELIT DAN RADIO DI INDONESIA',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima quibusdam soluta illo!',
                'file' => 'antena.png',
            ],
        ];

        Layanan::insert($layanans);
    }
}
