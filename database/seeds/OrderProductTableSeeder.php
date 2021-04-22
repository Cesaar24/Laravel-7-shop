<?php

use Illuminate\Database\Seeder;
use App\Orderproduct;
class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Orderproduct::class, 10000)->create();
    }
}
