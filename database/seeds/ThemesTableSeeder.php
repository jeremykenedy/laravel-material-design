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
				'name'	=> 'Default',
				'link' 	=> 'null',
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
				'name' => 'Blue Grey/ amber',
				'link' => 'material.blue_grey-amber.min.css',
			],
			[
				'name' => 'Blue Grey/ blue',
				'link' => 'material.blue_grey-blue.min.css',
			],
			[
				'name' => 'Blue Grey/ cyan',
				'link' => 'material.blue_grey-cyan.min.css',
			],
			[
				'name' => 'Blue Grey/ deep_orange',
				'link' => 'material.blue_grey-deep_orange.min.css',
			],
			[
				'name' => 'Blue Grey/ deep_purple',
				'link' => 'material.blue_grey-deep_purple.min.css',
			],
			[
				'name' => 'Blue Grey/ green',
				'link' => 'material.blue_grey-green.min.css',
			],
			[
				'name' => 'Blue Grey/ indigo',
				'link' => 'material.blue_grey-indigo.min.css',
			],
			[
				'name' => 'Blue Grey/ light_blue',
				'link' => 'material.blue_grey-light_blue.min.css',
			],
			[
				'name' => 'Blue Grey/ light_green',
				'link' => 'material.blue_grey-light_green.min.css',
			],
			[
				'name' => 'Blue Grey/ lime',
				'link' => 'material.blue_grey-lime.min.css',
			],
			[
				'name' => 'Blue Grey/ orange',
				'link' => 'material.blue_grey-orange.min.css',
			],
			[
				'name' => 'Blue Grey/ pink',
				'link' => 'material.blue_grey-pink.min.css',
			],
			[
				'name' => 'Blue Grey/ purple',
				'link' => 'material.blue_grey-purple.min.css',
			],
			[
				'name' => 'Blue Grey/ red',
				'link' => 'material.blue_grey-red.min.css',
			],
			[
				'name' => 'Blue Grey/ teal',
				'link' => 'material.blue_grey-teal.min.css',
			],
			[
				'name' => 'Blue Grey/ yellow',
				'link' => 'material.blue_grey-yellow.min.css',
			],
			[
				'name' => 'Blue / amber',
				'link' => 'material.blue-amber.min.css',
			],
			[
				'name' => 'Blue / cyan',
				'link' => 'material.blue-cyan.min.css',
			],
			[
				'name' => 'Blue / deep_orange',
				'link' => 'material.blue-deep_orange.min.css',
			],
			[
				'name' => 'Blue / deep_purple',
				'link' => 'material.blue-deep_purple.min.css',
			],
			[
				'name' => 'Blue / green',
				'link' => 'material.blue-green.min.css',
			],
			[
				'name' => 'Blue / indigo',
				'link' => 'material.blue-indigo.min.css',
			],
			[
				'name' => 'Blue / light_blue',
				'link' => 'material.blue-light_blue.min.css',
			],
			[
				'name' => 'Blue / light_green',
				'link' => 'material.blue-light_green.min.css',
			],
			[
				'name' => 'Blue / lime',
				'link' => 'material.blue-lime.min.css',
			],
			[
				'name' => 'Blue / orange',
				'link' => 'material.blue-orange.min.css',
			],
			[
				'name' => 'Blue / pink',
				'link' => 'material.blue-pink.min.css',
			],
			[
				'name' => 'Blue / purple',
				'link' => 'material.blue-purple.min.css',
			],
			[
				'name' => 'Blue / red',
				'link' => 'material.blue-red.min.css',
			],
			[
				'name' => 'Blue / teal',
				'link' => 'material.blue-teal.min.css',
			],
			[
				'name' => 'Blue / yellow',
				'link' => 'material.blue-yellow.min.css',
			],
			[
				'name' => 'Brown / amber',
				'link' => 'material.brown-amber.min.css',
			],
			[
				'name' => 'Brown / blue',
				'link' => 'material.brown-blue.min.css',
			],
			[
				'name' => 'Brown / cyan',
				'link' => 'material.brown-cyan.min.css',
			],
			[
				'name' => 'Brown / deep_orange',
				'link' => 'material.brown-deep_orange.min.css',
			],
			[
				'name' => 'Brown / deep_purple',
				'link' => 'material.brown-deep_purple.min.css',
			],
			[
				'name' => 'Brown / green',
				'link' => 'material.brown-green.min.css',
			],
			[
				'name' => 'Brown / indigo',
				'link' => 'material.brown-indigo.min.css',
			],
			[
				'name' => 'Brown / light_blue',
				'link' => 'material.brown-light_blue.min.css',
			],
			[
				'name' => 'Brown / light_green',
				'link' => 'material.brown-light_green.min.css',
			],
			[
				'name' => 'Brown / lime',
				'link' => 'material.brown-lime.min.css',
			],
			[
				'name' => 'Brown / orange',
				'link' => 'material.brown-orange.min.css',
			],
			[
				'name' => 'Brown / pink',
				'link' => 'material.brown-pink.min.css',
			],
			[
				'name' => 'Brown / purple',
				'link' => 'material.brown-purple.min.css',
			],
			[
				'name' => 'Brown / red',
				'link' => 'material.brown-red.min.css',
			],
			[
				'name' => 'Brown / teal',
				'link' => 'material.brown-teal.min.css',
			],
			[
				'name' => 'Brown / yellow',
				'link' => 'material.brown-yellow.min.css',
			],
			[
				'name' => 'Cyan / amber',
				'link' => 'material.cyan-amber.min.css',
			],
			[
				'name' => 'Cyan / blue',
				'link' => 'material.cyan-blue.min.css',
			],
			[
				'name' => 'Cyan / deep_orange',
				'link' => 'material.cyan-deep_orange.min.css',
			],
			[
				'name' => 'Cyan / deep_purple',
				'link' => 'material.cyan-deep_purple.min.css',
			],
			[
				'name' => 'Cyan / green',
				'link' => 'material.cyan-green.min.css',
			],
			[
				'name' => 'Cyan / indigo',
				'link' => 'material.cyan-indigo.min.css',
			],
			[
				'name' => 'Cyan / light_blue',
				'link' => 'material.cyan-light_blue.min.css',
			],
			[
				'name' => 'Cyan / light_green',
				'link' => 'material.cyan-light_green.min.css',
			],
			[
				'name' => 'Cyan / lime',
				'link' => 'material.cyan-lime.min.css',
			],
			[
				'name' => 'Cyan / orange',
				'link' => 'material.cyan-orange.min.css',
			],
			[
				'name' => 'Cyan / pink',
				'link' => 'material.cyan-pink.min.css',
			],
			[
				'name' => 'Cyan / purple',
				'link' => 'material.cyan-purple.min.css',
			],
			[
				'name' => 'Cyan / red',
				'link' => 'material.cyan-red.min.css',
			],
			[
				'name' => 'Cyan / teal',
				'link' => 'material.cyan-teal.min.css',
			],
			[
				'name' => 'Cyan / yellow',
				'link' => 'material.cyan-yellow.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-amber.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-blue.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-cyan.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-deep_purple.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-green.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-indigo.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-light_blue.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-light_green.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-lime.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-orange.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-pink.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-purple.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-red.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-teal.min.css',
			],
			[
				'name' => 'Deep Orange / SECOND',
				'link' => 'material.deep_orange-yellow.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-amber.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-blue.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-cyan.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-deep_orange.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-green.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-teal.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-red.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-orange.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-pink.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-purple.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-lime.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-light_green.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-indigo.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-light_blue.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-green.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-deep_purple.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-deep_orange.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-cyan.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-blue.min.css',
			],
			[
				'name' => 'Yellow / SECOND',
				'link' => 'material.yellow-amber.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-yellow.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-red.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-purple.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-pink.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-orange.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-lime.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-light_green.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-light_blue.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-indigo.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-green.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-deep_purple.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-deep_orange.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-cyan.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-blue.min.css',
			],
			[
				'name' => 'Teal / SECOND',
				'link' => 'material.teal-amber.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-yellow.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-teal.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-purple.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-pink.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-orange.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-lime.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-light_green.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-light_blue.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-indigo.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-green.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-deep_purple.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-deep_orange.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-cyan.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-blue.min.css',
			],
			[
				'name' => 'Red / SECOND',
				'link' => 'material.red-amber.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-yellow.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-teal.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-pink.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-orange.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-lime.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-light_green.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-light_blue.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-indigo.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-green.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-deep_purple.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-deep_orange.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-cyan.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-blue.min.css',
			],
			[
				'name' => 'Purple / SECOND',
				'link' => 'material.purple-amber.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-yellow.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-teal.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-red.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-purple.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-orange.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-lime.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-light_green.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-light_blue.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-indigo.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-green.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-deep_purple.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-deep_orange.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-cyan.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-blue.min.css',
			],
			[
				'name' => 'Pink / SECOND',
				'link' => 'material.pink-amber.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-yellow.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-teal.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-red.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-purple.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-pink.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-lime.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-light_green.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-light_blue.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-indigo.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-green.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-deep_purple.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-deep_orange.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-cyan.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-amber.min.css',
			],
			[
				'name' => 'Orange / SECOND',
				'link' => 'material.orange-blue.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-yellow.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-teal.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-red.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-purple.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-pink.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-orange.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-light_green.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-light_blue.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-indigo.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-green.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-deep_orange.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-deep_purple.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-cyan.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-blue.min.css',
			],
			[
				'name' => 'Lime / SECOND',
				'link' => 'material.lime-amber.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-yellow.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-teal.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-red.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-purple.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-pink.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-orange.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-lime.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-light_blue.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-indigo.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-green.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-deep_purple.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-deep_orange.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-cyan.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-blue.min.css',
			],
			[
				'name' => 'Light Green / SECOND',
				'link' => 'material.light_green-amber.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-yellow.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-teal.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-red.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-purple.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-pink.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-orange.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-lime.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-light_green.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-indigo.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-green.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-deep_purple.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-deep_orange.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-cyan.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-blue.min.css',
			],
			[
				'name' => 'Light Blue / SECOND',
				'link' => 'material.light_blue-amber.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-yellow.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-teal.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-red.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-purple.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-pink.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-orange.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-lime.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-light_green.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-light_blue.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-green.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-deep_purple.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-deep_orange.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-cyan.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-blue.min.css',
			],
			[
				'name' => 'Indigo / SECOND',
				'link' => 'material.indigo-amber.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-yellow.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-teal.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-red.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-purple.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-pink.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-orange.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-lime.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-light_green.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-light_blue.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-indigo.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-green.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-deep_purple.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-deep_orange.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-cyan.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-blue.min.css',
			],
			[
				'name' => 'Grey / SECOND',
				'link' => 'material.grey-amber.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-yellow.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-teal.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-red.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-purple.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-pink.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-orange.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-lime.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-light_green.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-light_blue.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-indigo.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-deep_purple.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-deep_orange.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-cyan.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-blue.min.css',
			],
			[
				'name' => 'Green / SECOND',
				'link' => 'material.green-amber.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-yellow.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-teal.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-red.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-purple.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-pink.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-orange.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-lime.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-light_green.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-light_blue.min.css',
			],
			[
				'name' => 'Deep Purple / SECOND',
				'link' => 'material.deep_purple-indigo.min.css',
			],

		];

		foreach ($themes as $theme) {

			$newTheme = Theme::where('name', '=', $theme['name'])->first();
	        if ($newTheme === null) {
	            $newTheme = Theme::create(array(
	            	'name'			=> $theme['name'],
	            	'link'			=> $theme['link'],
	            	'taggable_id'	=> 0,
	            	'taggable_type'	=> 'theme'
	            ));
	        }

		}

		$allThemes = Theme::All();
		foreach ($allThemes as $theme) {
			$theme->taggable_id = $theme->id;
			$theme->save();
		}

    }
}