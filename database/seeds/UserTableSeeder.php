<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		// admin
		$user = User::create([
			'name'     => 'web管理責任者',
			'email'    => 'admin@gmail.com',
			'password' => Hash::make('admin'),
		]);
		$user->assignRole('admin');

		// manager
		$user = User::create([
			'name'     => 'ecサイトマネージャ',
			'email'    => 'manager@gmail.com',
			'password' => Hash::make('manager'),
		]);
		$user->assignRole('manager');

		// staff
		$user = User::create([
			'name'     => 'スタッフ',
			'email'    => 'staff@gmail.com',
			'password' => Hash::make('staff'),
		]);
		$user->assignRole('staff');	

		// テスト客
		$user = User::create([
			'name'     => 'テストカスタマー',
			'email'    => 'test@gmail.com',
			'password' => Hash::make('test'),
		]);
		$user->assignRole('customer');	
	}
}
