<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// admin
		$user = User::create([
			'name'     => '管理者',
			'email'    => 'admin@localhost',
			'password' => Hash::make('admin'),
		]);
		$user->assignRole('admin');

		// manager
		$user = User::create([
			'name'     => 'マネージャー',
			'email'    => 'manager@localhost',
			'password' => Hash::make('manager'),
		]);
		$user->assignRole('manager');

		// staff
		$user = User::create([
			'name'     => 'スタッフ',
			'email'    => 'staff@localhost',
			'password' => Hash::make('staff'),
		]);
		$user->assignRole('staff');
	}
}
