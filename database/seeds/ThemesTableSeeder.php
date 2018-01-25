<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = [
            [
                'name'	 => 'Default',
                'link' 	=> 'material.min.css',
            ],
            [
                'name' => 'Amber / Blue',
                'link' => 'material.amber-blue.min.css',
            ],
            [
                'name' => 'Amber / Cyan',
                'link' => 'material.amber-cyan.min.css',
            ],
            [
                'name' => 'Amber / Deep Orange',
                'link' => 'material.amber-deep_orange.min.css',
            ],
            [
                'name' => 'Amber / Deep Purple',
                'link' => 'material.amber-deep_purple.min.css',
            ],
            [
                'name' => 'Amber / Green',
                'link' => 'material.amber-green.min.css',
            ],
            [
                'name' => 'Amber / Indigo',
                'link' => 'material.amber-indigo.min.css',
            ],
            [
                'name' => 'Amber / Light Blue',
                'link' => 'material.amber-light_blue.min.css',
            ],
            [
                'name' => 'Amber / Light Green',
                'link' => 'material.amber-light_green.min.css',
            ],
            [
                'name' => 'Amber / Lime',
                'link' => 'material.amber-lime.min.css',
            ],
            [
                'name' => 'Amber / Orange',
                'link' => 'material.amber-orange.min.css',
            ],
            [
                'name' => 'Amber / Pink',
                'link' => 'material.amber-pink.min.css',
            ],
            [
                'name' => 'Amber / Purple',
                'link' => 'material.amber-purple.min.css',
            ],
            [
                'name' => 'Amber / Red',
                'link' => 'material.amber-red.min.css',
            ],
            [
                'name' => 'Amber / Teal',
                'link' => 'material.amber-teal.min.css',
            ],
            [
                'name' => 'Amber / Yellow',
                'link' => 'material.amber-yellow.min.css',
            ],
            [
                'name' => 'Blue Grey / Amber',
                'link' => 'material.blue_grey-amber.min.css',
            ],
            [
                'name' => 'Blue Grey / Blue',
                'link' => 'material.blue_grey-blue.min.css',
            ],
            [
                'name' => 'Blue Grey / Cyan',
                'link' => 'material.blue_grey-cyan.min.css',
            ],
            [
                'name' => 'Blue Grey / Deep Orange',
                'link' => 'material.blue_grey-deep_orange.min.css',
            ],
            [
                'name' => 'Blue Grey / Deep Purple',
                'link' => 'material.blue_grey-deep_purple.min.css',
            ],
            [
                'name' => 'Blue Grey / Green',
                'link' => 'material.blue_grey-green.min.css',
            ],
            [
                'name' => 'Blue Grey / Indigo',
                'link' => 'material.blue_grey-indigo.min.css',
            ],
            [
                'name' => 'Blue Grey / Light Blue',
                'link' => 'material.blue_grey-light_blue.min.css',
            ],
            [
                'name' => 'Blue Grey / Light Green',
                'link' => 'material.blue_grey-light_green.min.css',
            ],
            [
                'name' => 'Blue Grey / Lime',
                'link' => 'material.blue_grey-lime.min.css',
            ],
            [
                'name' => 'Blue Grey / Orange',
                'link' => 'material.blue_grey-orange.min.css',
            ],
            [
                'name' => 'Blue Grey / Pink',
                'link' => 'material.blue_grey-pink.min.css',
            ],
            [
                'name' => 'Blue Grey / Purple',
                'link' => 'material.blue_grey-purple.min.css',
            ],
            [
                'name' => 'Blue Grey / Red',
                'link' => 'material.blue_grey-red.min.css',
            ],
            [
                'name' => 'Blue Grey / Teal',
                'link' => 'material.blue_grey-teal.min.css',
            ],
            [
                'name' => 'Blue Grey / Yellow',
                'link' => 'material.blue_grey-yellow.min.css',
            ],
            [
                'name' => 'Blue / Amber',
                'link' => 'material.blue-amber.min.css',
            ],
            [
                'name' => 'Blue / Cyan',
                'link' => 'material.blue-cyan.min.css',
            ],
            [
                'name' => 'Blue / Deep Orange',
                'link' => 'material.blue-deep_orange.min.css',
            ],
            [
                'name' => 'Blue / Deep Purple',
                'link' => 'material.blue-deep_purple.min.css',
            ],
            [
                'name' => 'Blue / Green',
                'link' => 'material.blue-green.min.css',
            ],
            [
                'name' => 'Blue / Indigo',
                'link' => 'material.blue-indigo.min.css',
            ],
            [
                'name' => 'Blue / Light Blue',
                'link' => 'material.blue-light_blue.min.css',
            ],
            [
                'name' => 'Blue / Light Green',
                'link' => 'material.blue-light_green.min.css',
            ],
            [
                'name' => 'Blue / Lime',
                'link' => 'material.blue-lime.min.css',
            ],
            [
                'name' => 'Blue / Orange',
                'link' => 'material.blue-orange.min.css',
            ],
            [
                'name' => 'Blue / Pink',
                'link' => 'material.blue-pink.min.css',
            ],
            [
                'name' => 'Blue / Purple',
                'link' => 'material.blue-purple.min.css',
            ],
            [
                'name' => 'Blue / Red',
                'link' => 'material.blue-red.min.css',
            ],
            [
                'name' => 'Blue / Teal',
                'link' => 'material.blue-teal.min.css',
            ],
            [
                'name' => 'Blue / Yellow',
                'link' => 'material.blue-yellow.min.css',
            ],
            [
                'name' => 'Brown / Amber',
                'link' => 'material.brown-amber.min.css',
            ],
            [
                'name' => 'Brown / Blue',
                'link' => 'material.brown-blue.min.css',
            ],
            [
                'name' => 'Brown / Cyan',
                'link' => 'material.brown-cyan.min.css',
            ],
            [
                'name' => 'Brown / Deep Orange',
                'link' => 'material.brown-deep_orange.min.css',
            ],
            [
                'name' => 'Brown / Deep Purple',
                'link' => 'material.brown-deep_purple.min.css',
            ],
            [
                'name' => 'Brown / Green',
                'link' => 'material.brown-green.min.css',
            ],
            [
                'name' => 'Brown / Indigo',
                'link' => 'material.brown-indigo.min.css',
            ],
            [
                'name' => 'Brown / Light Blue',
                'link' => 'material.brown-light_blue.min.css',
            ],
            [
                'name' => 'Brown / Light Green',
                'link' => 'material.brown-light_green.min.css',
            ],
            [
                'name' => 'Brown / Lime',
                'link' => 'material.brown-lime.min.css',
            ],
            [
                'name' => 'Brown / Orange',
                'link' => 'material.brown-orange.min.css',
            ],
            [
                'name' => 'Brown / Pink',
                'link' => 'material.brown-pink.min.css',
            ],
            [
                'name' => 'Brown / Purple',
                'link' => 'material.brown-purple.min.css',
            ],
            [
                'name' => 'Brown / Red',
                'link' => 'material.brown-red.min.css',
            ],
            [
                'name' => 'Brown / Teal',
                'link' => 'material.brown-teal.min.css',
            ],
            [
                'name' => 'Brown / Yellow',
                'link' => 'material.brown-yellow.min.css',
            ],
            [
                'name' => 'Cyan / Amber',
                'link' => 'material.cyan-amber.min.css',
            ],
            [
                'name' => 'Cyan / Blue',
                'link' => 'material.cyan-blue.min.css',
            ],
            [
                'name' => 'Cyan / Deep Orange',
                'link' => 'material.cyan-deep_orange.min.css',
            ],
            [
                'name' => 'Cyan / Deep Purple',
                'link' => 'material.cyan-deep_purple.min.css',
            ],
            [
                'name' => 'Cyan / Green',
                'link' => 'material.cyan-green.min.css',
            ],
            [
                'name' => 'Cyan / Indigo',
                'link' => 'material.cyan-indigo.min.css',
            ],
            [
                'name' => 'Cyan / Light Blue',
                'link' => 'material.cyan-light_blue.min.css',
            ],
            [
                'name' => 'Cyan / Light Green',
                'link' => 'material.cyan-light_green.min.css',
            ],
            [
                'name' => 'Cyan / Lime',
                'link' => 'material.cyan-lime.min.css',
            ],
            [
                'name' => 'Cyan / Orange',
                'link' => 'material.cyan-orange.min.css',
            ],
            [
                'name' => 'Cyan / Pink',
                'link' => 'material.cyan-pink.min.css',
            ],
            [
                'name' => 'Cyan / Purple',
                'link' => 'material.cyan-purple.min.css',
            ],
            [
                'name' => 'Cyan / Red',
                'link' => 'material.cyan-red.min.css',
            ],
            [
                'name' => 'Cyan / Teal',
                'link' => 'material.cyan-teal.min.css',
            ],
            [
                'name' => 'Cyan / Yellow',
                'link' => 'material.cyan-yellow.min.css',
            ],
            [
                'name' => 'Deep Orange / Amber',
                'link' => 'material.deep_orange-amber.min.css',
            ],
            [
                'name' => 'Deep Orange / Blue',
                'link' => 'material.deep_orange-blue.min.css',
            ],
            [
                'name' => 'Deep Orange / Cyan',
                'link' => 'material.deep_orange-cyan.min.css',
            ],
            [
                'name' => 'Deep Orange / Deep Purple',
                'link' => 'material.deep_orange-deep_purple.min.css',
            ],
            [
                'name' => 'Deep Orange / Green',
                'link' => 'material.deep_orange-green.min.css',
            ],
            [
                'name' => 'Deep Orange / Indigo',
                'link' => 'material.deep_orange-indigo.min.css',
            ],
            [
                'name' => 'Deep Orange / Light Blue',
                'link' => 'material.deep_orange-light_blue.min.css',
            ],
            [
                'name' => 'Deep Orange / Light Green',
                'link' => 'material.deep_orange-light_green.min.css',
            ],
            [
                'name' => 'Deep Orange / Lime',
                'link' => 'material.deep_orange-lime.min.css',
            ],
            [
                'name' => 'Deep Orange / Orange',
                'link' => 'material.deep_orange-orange.min.css',
            ],
            [
                'name' => 'Deep Orange / Pink',
                'link' => 'material.deep_orange-pink.min.css',
            ],
            [
                'name' => 'Deep Orange / Purple',
                'link' => 'material.deep_orange-purple.min.css',
            ],
            [
                'name' => 'Deep Orange / Red',
                'link' => 'material.deep_orange-red.min.css',
            ],
            [
                'name' => 'Deep Orange / Teal',
                'link' => 'material.deep_orange-teal.min.css',
            ],
            [
                'name' => 'Deep Orange / Yellow',
                'link' => 'material.deep_orange-yellow.min.css',
            ],
            [
                'name' => 'Deep Purple / Amber',
                'link' => 'material.deep_purple-amber.min.css',
            ],
            [
                'name' => 'Deep Purple / Blue',
                'link' => 'material.deep_purple-blue.min.css',
            ],
            [
                'name' => 'Deep Purple / Cyan',
                'link' => 'material.deep_purple-cyan.min.css',
            ],
            [
                'name' => 'Deep Purple / Deep Orange',
                'link' => 'material.deep_purple-deep_orange.min.css',
            ],
            [
                'name' => 'Deep Purple / Green',
                'link' => 'material.deep_purple-green.min.css',
            ],
            [
                'name' => 'Yellow / Teal',
                'link' => 'material.yellow-teal.min.css',
            ],
            [
                'name' => 'Yellow / Red',
                'link' => 'material.yellow-red.min.css',
            ],
            [
                'name' => 'Yellow / Orange',
                'link' => 'material.yellow-orange.min.css',
            ],
            [
                'name' => 'Yellow / Pink',
                'link' => 'material.yellow-pink.min.css',
            ],
            [
                'name' => 'Yellow / Purple',
                'link' => 'material.yellow-purple.min.css',
            ],
            [
                'name' => 'Yellow / Lime',
                'link' => 'material.yellow-lime.min.css',
            ],
            [
                'name' => 'Yellow / Light Green',
                'link' => 'material.yellow-light_green.min.css',
            ],
            [
                'name' => 'Yellow / Indigo',
                'link' => 'material.yellow-indigo.min.css',
            ],
            [
                'name' => 'Yellow / Light Blue',
                'link' => 'material.yellow-light_blue.min.css',
            ],
            [
                'name' => 'Yellow / Green',
                'link' => 'material.yellow-green.min.css',
            ],
            [
                'name' => 'Yellow / Deep Purple',
                'link' => 'material.yellow-deep_purple.min.css',
            ],
            [
                'name' => 'Yellow / Deep Orange',
                'link' => 'material.yellow-deep_orange.min.css',
            ],
            [
                'name' => 'Yellow / Cyan',
                'link' => 'material.yellow-cyan.min.css',
            ],
            [
                'name' => 'Yellow / Blue',
                'link' => 'material.yellow-blue.min.css',
            ],
            [
                'name' => 'Yellow / Amber',
                'link' => 'material.yellow-amber.min.css',
            ],
            [
                'name' => 'Teal / Yellow',
                'link' => 'material.teal-yellow.min.css',
            ],
            [
                'name' => 'Teal / Red',
                'link' => 'material.teal-red.min.css',
            ],
            [
                'name' => 'Teal / Purple',
                'link' => 'material.teal-purple.min.css',
            ],
            [
                'name' => 'Teal / Pink',
                'link' => 'material.teal-pink.min.css',
            ],
            [
                'name' => 'Teal / Orange',
                'link' => 'material.teal-orange.min.css',
            ],
            [
                'name' => 'Teal / Lime',
                'link' => 'material.teal-lime.min.css',
            ],
            [
                'name' => 'Teal / Light Green',
                'link' => 'material.teal-light_green.min.css',
            ],
            [
                'name' => 'Teal / Light Blue',
                'link' => 'material.teal-light_blue.min.css',
            ],
            [
                'name' => 'Teal / Indigo',
                'link' => 'material.teal-indigo.min.css',
            ],
            [
                'name' => 'Teal / Green',
                'link' => 'material.teal-green.min.css',
            ],
            [
                'name' => 'Teal / Deep Purple',
                'link' => 'material.teal-deep_purple.min.css',
            ],
            [
                'name' => 'Teal / Deep Orange',
                'link' => 'material.teal-deep_orange.min.css',
            ],
            [
                'name' => 'Teal / Cyan',
                'link' => 'material.teal-cyan.min.css',
            ],
            [
                'name' => 'Teal / Blue',
                'link' => 'material.teal-blue.min.css',
            ],
            [
                'name' => 'Teal / Amber',
                'link' => 'material.teal-amber.min.css',
            ],
            [
                'name' => 'Red / Yellow',
                'link' => 'material.red-yellow.min.css',
            ],
            [
                'name' => 'Red / Teal',
                'link' => 'material.red-teal.min.css',
            ],
            [
                'name' => 'Red / Purple',
                'link' => 'material.red-purple.min.css',
            ],
            [
                'name' => 'Red / Pink',
                'link' => 'material.red-pink.min.css',
            ],
            [
                'name' => 'Red / Orange',
                'link' => 'material.red-orange.min.css',
            ],
            [
                'name' => 'Red / Lime',
                'link' => 'material.red-lime.min.css',
            ],
            [
                'name' => 'Red / Light Green',
                'link' => 'material.red-light_green.min.css',
            ],
            [
                'name' => 'Red / Light Blue',
                'link' => 'material.red-light_blue.min.css',
            ],
            [
                'name' => 'Red / Indigo',
                'link' => 'material.red-indigo.min.css',
            ],
            [
                'name' => 'Red / Green',
                'link' => 'material.red-green.min.css',
            ],
            [
                'name' => 'Red / Deep Purple',
                'link' => 'material.red-deep_purple.min.css',
            ],
            [
                'name' => 'Red / Deep Orange',
                'link' => 'material.red-deep_orange.min.css',
            ],
            [
                'name' => 'Red / Cyan',
                'link' => 'material.red-cyan.min.css',
            ],
            [
                'name' => 'Red / Blue',
                'link' => 'material.red-blue.min.css',
            ],
            [
                'name' => 'Red / Amber',
                'link' => 'material.red-amber.min.css',
            ],
            [
                'name' => 'Purple / Yellow',
                'link' => 'material.purple-yellow.min.css',
            ],
            [
                'name' => 'Purple / Teal',
                'link' => 'material.purple-teal.min.css',
            ],
            [
                'name' => 'Purple / Pink',
                'link' => 'material.purple-pink.min.css',
            ],
            [
                'name' => 'Purple / Orange',
                'link' => 'material.purple-orange.min.css',
            ],
            [
                'name' => 'Purple / Lime',
                'link' => 'material.purple-lime.min.css',
            ],
            [
                'name' => 'Purple / Light Green',
                'link' => 'material.purple-light_green.min.css',
            ],
            [
                'name' => 'Purple / Light Blue',
                'link' => 'material.purple-light_blue.min.css',
            ],
            [
                'name' => 'Purple / Indigo',
                'link' => 'material.purple-indigo.min.css',
            ],
            [
                'name' => 'Purple / Green',
                'link' => 'material.purple-green.min.css',
            ],
            [
                'name' => 'Purple / Deep Purple',
                'link' => 'material.purple-deep_purple.min.css',
            ],
            [
                'name' => 'Purple / Deep Orange',
                'link' => 'material.purple-deep_orange.min.css',
            ],
            [
                'name' => 'Purple / Cyan',
                'link' => 'material.purple-cyan.min.css',
            ],
            [
                'name' => 'Purple / Blue',
                'link' => 'material.purple-blue.min.css',
            ],
            [
                'name' => 'Purple / Amber',
                'link' => 'material.purple-amber.min.css',
            ],
            [
                'name' => 'Pink / Yellow',
                'link' => 'material.pink-yellow.min.css',
            ],
            [
                'name' => 'Pink / Teal',
                'link' => 'material.pink-teal.min.css',
            ],
            [
                'name' => 'Pink / Red',
                'link' => 'material.pink-red.min.css',
            ],
            [
                'name' => 'Pink / Purple',
                'link' => 'material.pink-purple.min.css',
            ],
            [
                'name' => 'Pink / Orange',
                'link' => 'material.pink-orange.min.css',
            ],
            [
                'name' => 'Pink / Lime',
                'link' => 'material.pink-lime.min.css',
            ],
            [
                'name' => 'Pink / Light Green',
                'link' => 'material.pink-light_green.min.css',
            ],
            [
                'name' => 'Pink / Light Blue',
                'link' => 'material.pink-light_blue.min.css',
            ],
            [
                'name' => 'Pink / Indigo',
                'link' => 'material.pink-indigo.min.css',
            ],
            [
                'name' => 'Pink / Green',
                'link' => 'material.pink-green.min.css',
            ],
            [
                'name' => 'Pink / Deep Purple',
                'link' => 'material.pink-deep_purple.min.css',
            ],
            [
                'name' => 'Pink / Deep Orange',
                'link' => 'material.pink-deep_orange.min.css',
            ],
            [
                'name' => 'Pink / Cyan',
                'link' => 'material.pink-cyan.min.css',
            ],
            [
                'name' => 'Pink / Blue',
                'link' => 'material.pink-blue.min.css',
            ],
            [
                'name' => 'Pink / Amber',
                'link' => 'material.pink-amber.min.css',
            ],
            [
                'name' => 'Orange / Yellow',
                'link' => 'material.orange-yellow.min.css',
            ],
            [
                'name' => 'Orange / Teal',
                'link' => 'material.orange-teal.min.css',
            ],
            [
                'name' => 'Orange / Red',
                'link' => 'material.orange-red.min.css',
            ],
            [
                'name' => 'Orange / Purple',
                'link' => 'material.orange-purple.min.css',
            ],
            [
                'name' => 'Orange / Pink',
                'link' => 'material.orange-pink.min.css',
            ],
            [
                'name' => 'Orange / Lime',
                'link' => 'material.orange-lime.min.css',
            ],
            [
                'name' => 'Orange / Light Green',
                'link' => 'material.orange-light_green.min.css',
            ],
            [
                'name' => 'Orange / Light Blue',
                'link' => 'material.orange-light_blue.min.css',
            ],
            [
                'name' => 'Orange / Indigo',
                'link' => 'material.orange-indigo.min.css',
            ],
            [
                'name' => 'Orange / Green',
                'link' => 'material.orange-green.min.css',
            ],
            [
                'name' => 'Orange / Deep Purple',
                'link' => 'material.orange-deep_purple.min.css',
            ],
            [
                'name' => 'Orange / Deep Orange',
                'link' => 'material.orange-deep_orange.min.css',
            ],
            [
                'name' => 'Orange / Cyan',
                'link' => 'material.orange-cyan.min.css',
            ],
            [
                'name' => 'Orange / Amber',
                'link' => 'material.orange-amber.min.css',
            ],
            [
                'name' => 'Orange / Blue',
                'link' => 'material.orange-blue.min.css',
            ],
            [
                'name' => 'Lime / Yellow',
                'link' => 'material.lime-yellow.min.css',
            ],
            [
                'name' => 'Lime / Teal',
                'link' => 'material.lime-teal.min.css',
            ],
            [
                'name' => 'Lime / Red',
                'link' => 'material.lime-red.min.css',
            ],
            [
                'name' => 'Lime / Purple',
                'link' => 'material.lime-purple.min.css',
            ],
            [
                'name' => 'Lime / Pink',
                'link' => 'material.lime-pink.min.css',
            ],
            [
                'name' => 'Lime / Orange',
                'link' => 'material.lime-orange.min.css',
            ],
            [
                'name' => 'Lime / Light Green',
                'link' => 'material.lime-light_green.min.css',
            ],
            [
                'name' => 'Lime / Light Blue',
                'link' => 'material.lime-light_blue.min.css',
            ],
            [
                'name' => 'Lime / Indigo',
                'link' => 'material.lime-indigo.min.css',
            ],
            [
                'name' => 'Lime / Green',
                'link' => 'material.lime-green.min.css',
            ],
            [
                'name' => 'Lime / Deep Orange',
                'link' => 'material.lime-deep_orange.min.css',
            ],
            [
                'name' => 'Lime / Deep Purple',
                'link' => 'material.lime-deep_purple.min.css',
            ],
            [
                'name' => 'Lime / Cyan',
                'link' => 'material.lime-cyan.min.css',
            ],
            [
                'name' => 'Lime / Blue',
                'link' => 'material.lime-blue.min.css',
            ],
            [
                'name' => 'Lime / Amber',
                'link' => 'material.lime-amber.min.css',
            ],
            [
                'name' => 'Light Green / Yellow',
                'link' => 'material.light_green-yellow.min.css',
            ],
            [
                'name' => 'Light Green / Teal',
                'link' => 'material.light_green-teal.min.css',
            ],
            [
                'name' => 'Light Green / Red',
                'link' => 'material.light_green-red.min.css',
            ],
            [
                'name' => 'Light Green / Purple',
                'link' => 'material.light_green-purple.min.css',
            ],
            [
                'name' => 'Light Green / Pink',
                'link' => 'material.light_green-pink.min.css',
            ],
            [
                'name' => 'Light Green / Orange',
                'link' => 'material.light_green-orange.min.css',
            ],
            [
                'name' => 'Light Green / Lime',
                'link' => 'material.light_green-lime.min.css',
            ],
            [
                'name' => 'Light Green / Light Blue',
                'link' => 'material.light_green-light_blue.min.css',
            ],
            [
                'name' => 'Light Green / Indigo',
                'link' => 'material.light_green-indigo.min.css',
            ],
            [
                'name' => 'Light Green / Green',
                'link' => 'material.light_green-green.min.css',
            ],
            [
                'name' => 'Light Green / Deep Purple',
                'link' => 'material.light_green-deep_purple.min.css',
            ],
            [
                'name' => 'Light Green / Deep Orange',
                'link' => 'material.light_green-deep_orange.min.css',
            ],
            [
                'name' => 'Light Green / Cyan',
                'link' => 'material.light_green-cyan.min.css',
            ],
            [
                'name' => 'Light Green / Blue',
                'link' => 'material.light_green-blue.min.css',
            ],
            [
                'name' => 'Light Green / Amber',
                'link' => 'material.light_green-amber.min.css',
            ],
            [
                'name' => 'Light Blue / Yellow',
                'link' => 'material.light_blue-yellow.min.css',
            ],
            [
                'name' => 'Light Blue / Teal',
                'link' => 'material.light_blue-teal.min.css',
            ],
            [
                'name' => 'Light Blue / Red',
                'link' => 'material.light_blue-red.min.css',
            ],
            [
                'name' => 'Light Blue / Purple',
                'link' => 'material.light_blue-purple.min.css',
            ],
            [
                'name' => 'Light Blue / Pink',
                'link' => 'material.light_blue-pink.min.css',
            ],
            [
                'name' => 'Light Blue / Orange',
                'link' => 'material.light_blue-orange.min.css',
            ],
            [
                'name' => 'Light Blue / Lime',
                'link' => 'material.light_blue-lime.min.css',
            ],
            [
                'name' => 'Light Blue / Light Green',
                'link' => 'material.light_blue-light_green.min.css',
            ],
            [
                'name' => 'Light Blue / Indigo',
                'link' => 'material.light_blue-indigo.min.css',
            ],
            [
                'name' => 'Light Blue / Green',
                'link' => 'material.light_blue-green.min.css',
            ],
            [
                'name' => 'Light Blue / Deep Purple',
                'link' => 'material.light_blue-deep_purple.min.css',
            ],
            [
                'name' => 'Light Blue / Deep Orange',
                'link' => 'material.light_blue-deep_orange.min.css',
            ],
            [
                'name' => 'Light Blue / Cyan',
                'link' => 'material.light_blue-cyan.min.css',
            ],
            [
                'name' => 'Light Blue / Blue',
                'link' => 'material.light_blue-blue.min.css',
            ],
            [
                'name' => 'Light Blue / Amber',
                'link' => 'material.light_blue-amber.min.css',
            ],
            [
                'name' => 'Indigo / Yellow',
                'link' => 'material.indigo-yellow.min.css',
            ],
            [
                'name' => 'Indigo / Teal',
                'link' => 'material.indigo-teal.min.css',
            ],
            [
                'name' => 'Indigo / Red',
                'link' => 'material.indigo-red.min.css',
            ],
            [
                'name' => 'Indigo / Purple',
                'link' => 'material.indigo-purple.min.css',
            ],
            [
                'name' => 'Indigo / Pink',
                'link' => 'material.indigo-pink.min.css',
            ],
            [
                'name' => 'Indigo / Orange',
                'link' => 'material.indigo-orange.min.css',
            ],
            [
                'name' => 'Indigo / Lime',
                'link' => 'material.indigo-lime.min.css',
            ],
            [
                'name' => 'Indigo / Light Green',
                'link' => 'material.indigo-light_green.min.css',
            ],
            [
                'name' => 'Indigo / Light Blue',
                'link' => 'material.indigo-light_blue.min.css',
            ],
            [
                'name' => 'Indigo / Green',
                'link' => 'material.indigo-green.min.css',
            ],
            [
                'name' => 'Indigo / Deep Purple',
                'link' => 'material.indigo-deep_purple.min.css',
            ],
            [
                'name' => 'Indigo / Deep Orange',
                'link' => 'material.indigo-deep_orange.min.css',
            ],
            [
                'name' => 'Indigo / Cyan',
                'link' => 'material.indigo-cyan.min.css',
            ],
            [
                'name' => 'Indigo / Blue',
                'link' => 'material.indigo-blue.min.css',
            ],
            [
                'name' => 'Indigo / Amber',
                'link' => 'material.indigo-amber.min.css',
            ],
            [
                'name' => 'Grey / Yellow',
                'link' => 'material.grey-yellow.min.css',
            ],
            [
                'name' => 'Grey / Teal',
                'link' => 'material.grey-teal.min.css',
            ],
            [
                'name' => 'Grey / Red',
                'link' => 'material.grey-red.min.css',
            ],
            [
                'name' => 'Grey / Purple',
                'link' => 'material.grey-purple.min.css',
            ],
            [
                'name' => 'Grey / Pink',
                'link' => 'material.grey-pink.min.css',
            ],
            [
                'name' => 'Grey / Orange',
                'link' => 'material.grey-orange.min.css',
            ],
            [
                'name' => 'Grey / Lime',
                'link' => 'material.grey-lime.min.css',
            ],
            [
                'name' => 'Grey / Light Green',
                'link' => 'material.grey-light_green.min.css',
            ],
            [
                'name' => 'Grey / Light Blue',
                'link' => 'material.grey-light_blue.min.css',
            ],
            [
                'name' => 'Grey / Indigo',
                'link' => 'material.grey-indigo.min.css',
            ],
            [
                'name' => 'Grey / Green',
                'link' => 'material.grey-green.min.css',
            ],
            [
                'name' => 'Grey / Deep Purple',
                'link' => 'material.grey-deep_purple.min.css',
            ],
            [
                'name' => 'Grey / Deep Orange',
                'link' => 'material.grey-deep_orange.min.css',
            ],
            [
                'name' => 'Grey / Cyan',
                'link' => 'material.grey-cyan.min.css',
            ],
            [
                'name' => 'Grey / Blue',
                'link' => 'material.grey-blue.min.css',
            ],
            [
                'name' => 'Grey / Amber',
                'link' => 'material.grey-amber.min.css',
            ],
            [
                'name' => 'Green / Yellow',
                'link' => 'material.green-yellow.min.css',
            ],
            [
                'name' => 'Green / Teal',
                'link' => 'material.green-teal.min.css',
            ],
            [
                'name' => 'Green / Red',
                'link' => 'material.green-red.min.css',
            ],
            [
                'name' => 'Green / Purple',
                'link' => 'material.green-purple.min.css',
            ],
            [
                'name' => 'Green / Pink',
                'link' => 'material.green-pink.min.css',
            ],
            [
                'name' => 'Green / Orange',
                'link' => 'material.green-orange.min.css',
            ],
            [
                'name' => 'Green / Lime',
                'link' => 'material.green-lime.min.css',
            ],
            [
                'name' => 'Green / Light Green',
                'link' => 'material.green-light_green.min.css',
            ],
            [
                'name' => 'Green / Light Blue',
                'link' => 'material.green-light_blue.min.css',
            ],
            [
                'name' => 'Green / Indigo',
                'link' => 'material.green-indigo.min.css',
            ],
            [
                'name' => 'Green / Deep Purple',
                'link' => 'material.green-deep_purple.min.css',
            ],
            [
                'name' => 'Green / Deep Orange',
                'link' => 'material.green-deep_orange.min.css',
            ],
            [
                'name' => 'Green / Cyan',
                'link' => 'material.green-cyan.min.css',
            ],
            [
                'name' => 'Green / Blue',
                'link' => 'material.green-blue.min.css',
            ],
            [
                'name' => 'Green / Amber',
                'link' => 'material.green-amber.min.css',
            ],
            [
                'name' => 'Deep Purple / Yellow',
                'link' => 'material.deep_purple-yellow.min.css',
            ],
            [
                'name' => 'Deep Purple / Teal',
                'link' => 'material.deep_purple-teal.min.css',
            ],
            [
                'name' => 'Deep Purple / Red',
                'link' => 'material.deep_purple-red.min.css',
            ],
            [
                'name' => 'Deep Purple / Purple',
                'link' => 'material.deep_purple-purple.min.css',
            ],
            [
                'name' => 'Deep Purple / Pink',
                'link' => 'material.deep_purple-pink.min.css',
            ],
            [
                'name' => 'Deep Purple / Orange',
                'link' => 'material.deep_purple-orange.min.css',
            ],
            [
                'name' => 'Deep Purple / Lime',
                'link' => 'material.deep_purple-lime.min.css',
            ],
            [
                'name' => 'Deep Purple / Light Green',
                'link' => 'material.deep_purple-light_green.min.css',
            ],
            [
                'name' => 'Deep Purple / Light Blue',
                'link' => 'material.deep_purple-light_blue.min.css',
            ],
            [
                'name' => 'Deep Purple / Indigo',
                'link' => 'material.deep_purple-indigo.min.css',
            ],

        ];

        foreach ($themes as $theme) {
            $newTheme = Theme::where('name', '=', $theme['name'])->first();
            if ($newTheme === null) {
                $newTheme = Theme::create([
                    'name'			       => $theme['name'],
                    'link'			       => $theme['link'],
                    'taggable_id'	  => 0,
                    'taggable_type'	=> 'theme',
                ]);
            }
        }

        $allThemes = Theme::All();
        foreach ($allThemes as $theme) {
            $theme->taggable_id = $theme->id;
            $theme->save();
        }
    }
}
