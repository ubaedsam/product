<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Kategoris;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menambah data stock sebanyak 5 data
        // Stock::factory(5)->create();

        // Menambah data product sebanyak 5 data
        // Product::factory(5)->create();

        // Menambah data kategori sebanyak 5 data
        // Kategoris::factory(5)->create();
    }
}
