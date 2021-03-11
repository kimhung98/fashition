<?php

namespace Database\Seeders;

use Core\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name' => 'Hồng',
            'color' => 'FFC0CB',
        ]);

        Color::create([
            'name' => 'Tím',
            'color' => '800080',
        ]);

        Color::create([
            'name' => 'Đỏ',
            'color' => 'FF0000',
        ]);

        Color::create([
            'name' => 'Cam',
            'color' => 'FFA500',
        ]);

        Color::create([
            'name' => 'Vàng',
            'color' => 'FFFF00',
        ]);

        Color::create([
            'name' => 'Xanh lá',
            'color' => '00FF00',
        ]);

        Color::create([
            'name' => 'Xanh dương',
            'color' => '0000FF',
        ]);

        Color::create([
            'name' => 'Nâu',
            'color' => 'A52A2A',
        ]);

        Color::create([
            'name' => 'Trắng',
            'color' => 'FFFFFF',
        ]);

        Color::create([
            'name' => 'Xám',
            'color' => '808080',
        ]);

        Color::create([
            'name' => 'Đen',
            'color' => '000000',
        ]);

    }
}
