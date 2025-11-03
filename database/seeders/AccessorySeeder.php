<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessories = [
            // gems
            ['category'=>'gems','varian'=>'zircon','color'=>'White','warna'=>'Putih','opacity'=>0,'slug'=>'gems-zircon-white-o0','codename'=>'m.pT'], // T: Transparent
            ['category'=>'gems','varian'=>'zircon','color'=>'White','warna'=>'Putih','opacity'=>1,'slug'=>'gems-zircon-white-o1','codename'=>'m.pD'], // D: Dense
            ['category'=>'gems','varian'=>'zircon','color'=>'Red','warna'=>'Merah','opacity'=>0,'slug'=>'gems-zircon-red-o0','codename'=>'m.mT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Red','warna'=>'Merah','opacity'=>1,'slug'=>'gems-zircon-red-o1','codename'=>'m.mD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Pink','warna'=>'Pink','opacity'=>0,'slug'=>'gems-zircon-pink-o0','codename'=>'m.pinkT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Pink','warna'=>'Pink','opacity'=>1,'slug'=>'gems-zircon-pink-o1','codename'=>'m.pinkD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Orange','warna'=>'Oranye','opacity'=>0,'slug'=>'gems-zircon-orange-o0','codename'=>'m.oT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Orange','warna'=>'Oranye','opacity'=>1,'slug'=>'gems-zircon-orange-o1','codename'=>'m.oD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Yellow','warna'=>'Kuning','opacity'=>0,'slug'=>'gems-zircon-yellow-o0','codename'=>'m.kT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Yellow','warna'=>'Kuning','opacity'=>1,'slug'=>'gems-zircon-yellow-o1','codename'=>'m.kD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Lime','warna'=>'Lemon','opacity'=>0,'slug'=>'gems-zircon-lime-o0','codename'=>'m.lT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Lime','warna'=>'Lemon','opacity'=>1,'slug'=>'gems-zircon-lime-o1','codename'=>'m.lD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Emerald','warna'=>'Emerald','opacity'=>0,'slug'=>'gems-zircon-emerald-o0','codename'=>'m.emT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Emerald','warna'=>'Emerald','opacity'=>1,'slug'=>'gems-zircon-emerald-o1','codename'=>'m.emD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Green','warna'=>'Hijau','opacity'=>0,'slug'=>'gems-zircon-green-o0','codename'=>'m.hjT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Green','warna'=>'Hijau','opacity'=>1,'slug'=>'gems-zircon-green-o1','codename'=>'m.hjD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Blue','warna'=>'Biru','opacity'=>0,'slug'=>'gems-zircon-green-o0','codename'=>'m.bT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Blue','warna'=>'Biru','opacity'=>1,'slug'=>'gems-zircon-green-o1','codename'=>'m.bD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Sky Blue','warna'=>'Biru Langit','opacity'=>0,'slug'=>'gems-zircon-skyblue-o0','codename'=>'m.skyT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Sky Blue','warna'=>'Biru Langit','opacity'=>1,'slug'=>'gems-zircon-skyblue-o1','codename'=>'m.skyD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Indigo','warna'=>'Nila','opacity'=>0,'slug'=>'gems-zircon-indigo-o0','codename'=>'m.nT'], // Warna Nila = Ungu + Biru => indigo
            ['category'=>'gems','varian'=>'zircon','color'=>'Indigo','warna'=>'Nila','opacity'=>1,'slug'=>'gems-zircon-indigo-o1','codename'=>'m.nD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Violet','warna'=>'Ungu','opacity'=>0,'slug'=>'gems-zircon-violet-o0','codename'=>'m.uT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Violet','warna'=>'Ungu','opacity'=>1,'slug'=>'gems-zircon-violet-o1','codename'=>'m.uD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Brown','warna'=>'Coklat','opacity'=>0,'slug'=>'gems-zircon-brown-o0','codename'=>'m.cT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Brown','warna'=>'Coklat','opacity'=>1,'slug'=>'gems-zircon-brown-o1','codename'=>'m.cD'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Black','warna'=>'Hitam','opacity'=>0,'slug'=>'gems-zircon-green-o0','codename'=>'m.htT'],
            ['category'=>'gems','varian'=>'zircon','color'=>'Black','warna'=>'Hitam','opacity'=>1,'slug'=>'gems-zircon-green-o1','codename'=>'m.htD'],
            // mainan
            ['category'=>'toys','name'=>'Bola','slug'=>'toys-bola','codename'=>'m-Bola'],
            ['category'=>'toys','name'=>'Daisy Duck','slug'=>'toys-daisy-duck','codename'=>'m-Daisy'],
            ['category'=>'toys','name'=>'Donald Duck','slug'=>'toys-donald-duck','codename'=>'m-Donald'],
            ['category'=>'toys','name'=>'Dora','slug'=>'toys-dora','codename'=>'m-Dora'],
            ['category'=>'toys','name'=>'Goofy','slug'=>'toys-goofy','codename'=>'m-goofy'],
            ['category'=>'toys','name'=>'Hello Kitty','slug'=>'toys-hello-kitty','codename'=>'m-HelloKitty'],
            ['category'=>'toys','name'=>'Keroppi','slug'=>'toys-keroppi','codename'=>'m-Keroppi'],
            ['category'=>'toys','name'=>'Lonceng','slug'=>'toys-lonceng','codename'=>'m-Lonceng'],
            ['category'=>'toys','name'=>'Lonceng Daun','slug'=>'toys-lonceng-daun','codename'=>'m-LoncengDaun'],
            ['category'=>'toys','name'=>'Lonceng Kupu','slug'=>'toys-lonceng-kupu','codename'=>'m-LoncengKupu'],
            ['category'=>'toys','name'=>'Love','slug'=>'toys-love','codename'=>'m-Love'],
            ['category'=>'toys','name'=>'Love Ukir','slug'=>'toys-love-ukir','codename'=>'m-LoveUkir'],
            ['category'=>'toys','name'=>'Mickey Mouse','slug'=>'toys-mickey-mouse','codename'=>'m-Mickey'],
            ['category'=>'toys','name'=>'Minnie Mouse','slug'=>'toys-minnie-mouse','codename'=>'m-Minnie'],
            ['category'=>'toys','name'=>'Patrick','slug'=>'toys-patrick','codename'=>'m-Patrick'],
            ['category'=>'toys','name'=>'SpongeBob','slug'=>'toys-spongebob','codename'=>'m-SpongeBob'],
            // plates
            ['category'=>'plates','name'=>'Plat','slug'=>'plates','codename'=>'pl'],
            ['category'=>'plates','name'=>'Plat Ukir','slug'=>'plates-carved','codename'=>'pl.ukir'],
            ['category'=>'plates','name'=>'Plat Mata','slug'=>'plates-gems','codename'=>'pl.mata'],
            ['category'=>'plates','name'=>'Plat Ukir Mata','slug'=>'plates-carved-gems','codename'=>'pl.ukir_mata'],

        ];

        $keyBarcode = 1;
        foreach ($accessories as $accessory) {
            if (str_contains((string)$keyBarcode, '4')) {
                $keyBarcode++; // skip barcode with digit '4'
            }
            $barcode = str_pad((string)$keyBarcode, 4, '0', STR_PAD_LEFT);
            $accessory['barcode'] = $barcode;
            \App\Models\Accessory::create($accessory);
            $keyBarcode++;
        }
    }
}
