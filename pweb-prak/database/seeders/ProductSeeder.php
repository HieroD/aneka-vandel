<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->createMany([
            // Vandel
            [
                'name' => 'Vandel Marmer Premium',
                'description' => 'Vandel berbahan marmer asli dengan finishing mengkilap. Cocok untuk penghargaan dan souvenir acara resmi. Tersedia dalam berbagai ukuran.',
                'category' => 'Vandel',
                'price' => 150000,
                'total_product' => 15,
                'img_path' => 'assets/vandelmarmer.png',
            ],
            [
                'name' => 'Vandel Akrilik Mewah',
                'description' => 'Vandel akrilik bening dengan desain modern dan elegan. Dilengkapi grafir laser presisi tinggi untuk hasil yang rapi dan tahan lama.',
                'category' => 'Vandel',
                'price' => 85000,
                'total_product' => 25,
                'img_path' => 'assets/vandel-produk.png',
            ],
            [
                'name' => 'Vandel Kaca Ukir',
                'description' => 'Vandel kaca dengan ukiran motif klasik. Proses pembuatan menggunakan teknik sandblast sehingga hasilnya detail dan indah.',
                'category' => 'Vandel',
                'price' => 120000,
                'total_product' => 10,
                'img_path' => 'assets/vandel-produk.png',
            ],
            [
                'name' => 'Vandel Kayu Jati',
                'description' => 'Vandel kayu jati pilihan dengan serat kayu alami. Memberikan kesan hangat dan tradisional. Cocok untuk cinderamata perusahaan.',
                'category' => 'Vandel',
                'price' => 95000,
                'total_product' => 20,
                'img_path' => 'assets/vandelmarmer.png',
            ],

            // Prasasti
            [
                'name' => 'Prasasti Marmer Hitam',
                'description' => 'Prasasti berbahan marmer hitam impor dengan teks timbul berwarna emas. Cocok untuk peresmian gedung, tugu, atau monumen.',
                'category' => 'Prasasti',
                'price' => 250000,
                'total_product' => 8,
                'img_path' => 'assets/batu-produk.png',
            ],
            [
                'name' => 'Prasasti Granit Abu',
                'description' => 'Prasasti granit abu natural dengan finishing poles halus. Tahan terhadap cuaca ekstrem sehingga cocok untuk prasasti luar ruangan.',
                'category' => 'Prasasti',
                'price' => 300000,
                'total_product' => 5,
                'img_path' => 'assets/batu-produk.png',
            ],
            [
                'name' => 'Prasasti Batu Andesit',
                'description' => 'Prasasti batu andesit dengan tekstur khas alami. Proses pembuatan dengan teknik pahat manual dan sentuhan akhir yang profesional.',
                'category' => 'Prasasti',
                'price' => 200000,
                'total_product' => 12,
                'img_path' => 'assets/batu-produk.png',
            ],

            // Kijangan
            [
                'name' => 'Kijangan Bali Motif',
                'description' => 'Kijangan khas Bali dengan anyaman tradisional bermotif geometris. Dibuat oleh pengrajin berpengalaman dari bahan bambu pilihan.',
                'category' => 'Kijangan',
                'price' => 75000,
                'total_product' => 30,
                'img_path' => 'assets/kijangan-produk.png',
            ],
            [
                'name' => 'Kijangan Ukir Emas',
                'description' => 'Kijangan dengan hiasan ukiran motif khas dan sentuhan cat emas. Tampilan mewah dan cocok untuk dekorasi interior.',
                'category' => 'Kijangan',
                'price' => 125000,
                'total_product' => 18,
                'img_path' => 'assets/kijangan-produk.png',
            ],
            [
                'name' => 'Kijangan Premium Serat',
                'description' => 'Kijangan modern berbahan serat alami dengan desain kontemporer. Ringan, awet, dan mudah dipasang di dinding.',
                'category' => 'Kijangan',
                'price' => 100000,
                'total_product' => 22,
                'img_path' => 'assets/kijangan-produk.png',
            ],
        ]);
    }
}