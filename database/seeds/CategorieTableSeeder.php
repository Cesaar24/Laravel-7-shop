<?php

use Illuminate\Database\Seeder;
use App\Categorie;
class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Categorie::class, 100)->create();//Modal factory usa el modal original
    }
}
