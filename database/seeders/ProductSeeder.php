<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            // ======================
            // CATEGORIES
            // ======================
            // DB::table('categories')->insert([
            //     ['id'=>1,'name'=>'Computer Accessories','slug'=>'computer-accessories','parent_id'=>null],
            //     ['id'=>2,'name'=>'Keyboards','slug'=>'keyboards','parent_id'=>1],
            //     ['id'=>3,'name'=>'Mice','slug'=>'mice','parent_id'=>1],
            //     ['id'=>4,'name'=>'Headsets','slug'=>'headsets','parent_id'=>1],
            //     ['id'=>5,'name'=>'Webcams','slug'=>'webcams','parent_id'=>1],
            //     ['id'=>6,'name'=>'Mouse Pads','slug'=>'mouse-pads','parent_id'=>1],
            //     ['id'=>7,'name'=>'Combo','slug'=>'combo','parent_id'=>1],
            // ]);

            // // ======================
            // // PRODUCTS (EXPANDED)
            // // ======================
            // DB::table('products')->insert([
            //     ['id'=>1,'name'=>'Logitech G102 Lightsync RGB Gaming Mouse','slug'=>'logitech-g102','description'=>'RGB gaming mouse','brand'=>'Logitech','is_active'=>1],
            //     ['id'=>2,'name'=>'Razer DeathAdder Essential Gaming Mouse','slug'=>'razer-deathadder','description'=>'Ergonomic gaming mouse','brand'=>'Razer','is_active'=>1],
            //     ['id'=>3,'name'=>'Redragon K552 Mechanical Keyboard','slug'=>'redragon-k552','description'=>'RGB mechanical keyboard','brand'=>'Redragon','is_active'=>1],
            //     ['id'=>4,'name'=>'A4Tech Bloody B120 Keyboard','slug'=>'a4tech-b120','description'=>'RGB membrane keyboard','brand'=>'A4Tech','is_active'=>1],
            //     ['id'=>5,'name'=>'Logitech H111 Headset','slug'=>'logitech-h111','description'=>'Stereo headset','brand'=>'Logitech','is_active'=>1],
            //     ['id'=>6,'name'=>'Razer BlackShark V2 X','slug'=>'razer-blackshark','description'=>'Gaming headset','brand'=>'Razer','is_active'=>1],
            //     ['id'=>7,'name'=>'Logitech C270 Webcam','slug'=>'logitech-c270','description'=>'HD webcam','brand'=>'Logitech','is_active'=>1],
            //     ['id'=>8,'name'=>'Havit Gaming Combo','slug'=>'havit-combo','description'=>'Keyboard mouse combo','brand'=>'Havit','is_active'=>1],
            //     ['id'=>9,'name'=>'Fantech MP44 Mouse Pad','slug'=>'fantech-mp44','description'=>'Gaming mouse pad','brand'=>'Fantech','is_active'=>1],

            //     // NEW PRODUCTS
            //     ['id'=>10,'name'=>'Logitech G Pro Wireless Mouse','slug'=>'logitech-gpro','description'=>'Pro wireless gaming mouse','brand'=>'Logitech','is_active'=>1],
            //     ['id'=>11,'name'=>'Razer Basilisk Essential Mouse','slug'=>'razer-basilisk','description'=>'Advanced gaming mouse','brand'=>'Razer','is_active'=>1],
            //     ['id'=>12,'name'=>'Corsair K70 RGB Mechanical Keyboard','slug'=>'corsair-k70','description'=>'Premium mechanical keyboard','brand'=>'Corsair','is_active'=>1],
            //     ['id'=>13,'name'=>'HyperX Alloy Core RGB Keyboard','slug'=>'hyperx-alloy','description'=>'RGB gaming keyboard','brand'=>'HyperX','is_active'=>1],
            //     ['id'=>14,'name'=>'Logitech G733 Wireless Headset','slug'=>'logitech-g733','description'=>'Wireless gaming headset','brand'=>'Logitech','is_active'=>1],
            //     ['id'=>15,'name'=>'Razer Kraken X Headset','slug'=>'razer-kraken','description'=>'Lightweight headset','brand'=>'Razer','is_active'=>1],
            // ]);

            // // ======================
            // // PRODUCT VARIANTS (EXPANDED)
            // // ======================
            // DB::table('product_variants')->insert([
            //     ['product_id'=>1,'sku'=>'LOG-G102-BLK','color'=>'Black','size'=>null,'price'=>1800,'sale_price'=>1600,'stock'=>50],
            //     ['product_id'=>1,'sku'=>'LOG-G102-WHT','color'=>'White','size'=>null,'price'=>1900,'sale_price'=>null,'stock'=>30],
            //     ['product_id'=>2,'sku'=>'RAZ-DA-BLK','color'=>'Black','size'=>null,'price'=>2500,'sale_price'=>2300,'stock'=>40],
            //     ['product_id'=>3,'sku'=>'RED-K552','color'=>'Black','size'=>'TKL','price'=>4200,'sale_price'=>3900,'stock'=>25],
            //     ['product_id'=>4,'sku'=>'A4-B120','color'=>'Black','size'=>'Full','price'=>2500,'sale_price'=>null,'stock'=>60],
            //     ['product_id'=>5,'sku'=>'LOG-H111','color'=>'Black','size'=>null,'price'=>900,'sale_price'=>null,'stock'=>100],
            //     ['product_id'=>6,'sku'=>'RAZ-BSV2X','color'=>'Black','size'=>null,'price'=>4500,'sale_price'=>4200,'stock'=>20],
            //     ['product_id'=>7,'sku'=>'LOG-C270','color'=>'Black','size'=>null,'price'=>2500,'sale_price'=>2300,'stock'=>35],
            //     ['product_id'=>8,'sku'=>'HAV-CMB','color'=>'Black','size'=>'Full','price'=>3200,'sale_price'=>2900,'stock'=>45],
            //     ['product_id'=>9,'sku'=>'FAN-MP44','color'=>'Black','size'=>'Large','price'=>700,'sale_price'=>null,'stock'=>80],

            //     // NEW VARIANTS
            //     ['product_id'=>10,'sku'=>'LOG-GPRO','color'=>'Black','size'=>null,'price'=>3500,'sale_price'=>3200,'stock'=>25],
            //     ['product_id'=>11,'sku'=>'RAZ-BAS','color'=>'Black','size'=>null,'price'=>2800,'sale_price'=>2600,'stock'=>30],
            //     ['product_id'=>12,'sku'=>'COR-K70','color'=>'Black','size'=>null,'price'=>5000,'sale_price'=>4800,'stock'=>20],
            //     ['product_id'=>13,'sku'=>'HYP-ALLOY','color'=>'Black','size'=>null,'price'=>3800,'sale_price'=>3600,'stock'=>35],
            //     ['product_id'=>14,'sku'=>'LOG-G733','color'=>'Black','size'=>null,'price'=>2200,'sale_price'=>2000,'stock'=>40],
            //     ['product_id'=>15,'sku'=>'RAZ-KRKN','color'=>'Black','size'=>null,'price'=>1800,'sale_price'=>1600,'stock'=>50],
            // ]);
            DB::table('category_products')->insert([
                [ 'category_id'=>3,'product_id'=>1 ],
                [ 'category_id'=>3,'product_id'=>2 ],
                [ 'category_id'=>2,'product_id'=>3 ],
                [ 'category_id'=>2,'product_id'=>4 ],
                [ 'category_id'=>4,'product_id'=>5 ],
                [ 'category_id'=>4,'product_id'=>6 ],
                [ 'category_id'=>5,'product_id'=>7 ],
                [ 'category_id'=>7,'product_id'=>8 ],
                [ 'category_id'=>6,'product_id'=>9 ],

                // NEW MAPPINGS
                [ 'category_id'=>3,'product_id'=>10 ],
                [ 'category_id'=>3,'product_id'=>11 ],
                [ 'category_id'=>2,'product_id'=>12 ],
                [ 'category_id'=>2,'product_id'=>13 ],
                [ 'category_id'=>4,'product_id'=>14 ],
                [ 'category_id'=>4,'product_id'=>15 ],
            ]);
        });
    }
}
