<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    // php artisan migrate:fresh --seed run es el inicio del seeding
    public function run()
    {
        $this->call(ProductTableSeeder::class);//llamo un seeder para usar modal factory
        $this->call(CategorieTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        
    }
}
