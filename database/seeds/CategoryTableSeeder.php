<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=["politica","sport","amore","sessualità","relazioni","economia"];
        foreach ($categories as $key => $category) {
            $newCategory=new Category();
            $newCategory->name=$category;
            $newCategory->save();   
        }
    }
}
