<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoldStandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goldStandards = [
            ['name'=>'200','slug'=>'200','class'=>'md','purity'=>20,'carat'=>5,'carat_ratio'=>20.83,'barcode'=>'01'],
            ['name'=>'200','slug'=>'250','class'=>'md','purity'=>25,'carat'=>6,'carat_ratio'=>25,'barcode'=>'02'],
            ['name'=>'300','slug'=>'300','class'=>'md','purity'=>30,'carat'=>7,'carat_ratio'=>31.25,'barcode'=>'02'],
            ['name'=>'400','slug'=>'400','class'=>'md','purity'=>40,'carat'=>10,'carat_ratio'=>41.67,'barcode'=>'03'],
            ['name'=>'500','slug'=>'500','class'=>'md','purity'=>50,'carat'=>12,'carat_ratio'=>52.08,'barcode'=>'04'],
            ['name'=>'600','slug'=>'600','class'=>'hd','purity'=>60,'carat'=>14,'carat_ratio'=>62.50,'barcode'=>'05'],
            ['name'=>'700','slug'=>'700','class'=>'hd','purity'=>70,'carat'=>16,'carat_ratio'=>72.92,'barcode'=>'06'],
            ['name'=>'800','slug'=>'800','class'=>'hd','purity'=>80,'carat'=>18,'carat_ratio'=>83.33,'barcode'=>'07'],
            ['name'=>'900','slug'=>'900','class'=>'hd','purity'=>90,'carat'=>20,'carat_ratio'=>93.75,'barcode'=>'08'],
            ['name'=>'999','slug'=>'999','class'=>'hd','purity'=>99.9,'carat'=>24,'carat_ratio'=>100.00,'barcode'=>'09'],
        ];

        \DB::table('gold_colors')->insert($goldStandards);
    }
}
