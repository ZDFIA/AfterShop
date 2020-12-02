<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Item;

class CreateItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Nagita Tunik',
                'price' => 65000,
                'stock' => 92,
                'information' => 'Bahan: Wollpeach, LD: 104 cm P: 65-75 cm, Size: XL',
                'image' => '8100686_7d850bbe-2616-4ac8-835f-67e06e858bb5_800_800.jpg',
            ],
            [
                'name' => 'Celana Jogger Wanita Import',
                'price' => 69500,
                'stock' => 4,
                'information' => 'Rosana (All Size Fit L Pj 92) Bahan katun',
                'image' => '157968211958374_90e92d87-8265-428b-893f-6c8fd6d9c509.jpg',
            ],
            [
                'name' => 'A5',
                'price' => 75000,
                'stock' => 31,
                'information' => 'Tas Ransel Canvas A5',
                'image' => '5401864_ed532e7a-602f-449d-a4da-a069702bd909_640_640.jpg',
            ],
            [
                'name' => 'Sepatu Warior PX Star Low',
                'price' => 72000,
                'stock' => 517,
                'information' => 'Cocok untuk sekolah, kuliah dan fashion',
                'image' => '40791516_413961aa-f839-4c4f-8bce-4d448b4de476_2048_1365.jpg',
            ],
            [
                'name' => 'KAIRUI',
                'price' => 69000,
                'stock' => 10,
                'information' => 'KAIRUI Topi  Baseball',
                'image' => 'kairui-topi-baseball-visor-sport-fashion-hat-mz237-black-10.jpg',
            ],
            [
                'name' => 'Jaket Parka Kombinasi Pria',
                'price' => 95000,
                'stock' => 65,
                'information' => 'JAKET PARKA KOMBINASI, BAHAN KANVAS KATUN ORI, ALL SIZE FIT L',
                'image' => '688688908_11c3403a-1f01-451c-920b-95335d71783c_594_594.jpg',
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
