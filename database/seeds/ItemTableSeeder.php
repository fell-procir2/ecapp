<?php
use App\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
	public function run()
	{
		// CPU
		$item = Item::create([
			'name'     => 'Core i7 9700K BOX',
			'content'    => '8C 8T 3.6GHz LGA1151',
			'price' => 43464,
			'quantity' => 10,
		]);

		$item = Item::create([
			'name'     => 'Core i5 9600 BOX',
			'content'    => '6C 6T 3.1GHz LGA1151',
			'price' => 26723,
			'quantity' => 15,
		]);

		$item = Item::create([
			'name'     => 'Core i3 9100 BOX',
			'content'    => '4C 4T 3.6GHz LGA1151',
			'price' => 15787,
			'quantity' => 14,
		]);

		$item = Item::create([
			'name'     => 'Pentium Gold G5400 BOX',
			'content'    => '2C 4T 3.7GHz LGA1151',
			'price' => 6770,
			'quantity' => 5,
		]);
	}
}
