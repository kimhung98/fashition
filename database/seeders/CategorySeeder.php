<?php

namespace Database\Seeders;

use Core\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Nam',
            'name_unsigned' => 'nam',
        ]);

        Category::create([
            'name' => 'Nữ',
            'name_unsigned' => 'nu',
        ]);
    }
}
