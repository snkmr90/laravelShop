<?php
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ProductSeeder extends Seeder
{
    use RefreshDatabase;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product::truncate();
        // create a product and save them to the database
        for($i=0;$i<=10;$i++){
        factory(Product::class)->create();
        }
    }
}
