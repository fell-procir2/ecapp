<?php
use App\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
	public function run()
	{
		// admin
		$item = Item::create([
			'name'     => 'web管理責任者',
			'email'    => 'admin@gmail.com',
			'password' => Hash::make('admin'),
		]);

		// manager
		$item = Item::create([
			'name'     => 'ecサイトマネージャ',
			'email'    => 'manager@gmail.com',
			'password' => Hash::make('manager'),
		]);

		// staff
		$item = Item::create([
			'name'     => 'スタッフ',
			'email'    => 'staff@gmail.com',
			'password' => Hash::make('staff'),
		]);

		// テスト客
		$item = Item::create([
			'name'     => 'テストカスタマー',
			'email'    => 'test@gmail.com',
			'password' => Hash::make('test'),
		]);
	}
}
