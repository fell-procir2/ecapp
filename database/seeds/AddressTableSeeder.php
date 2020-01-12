<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user_id = 4;
		$zip = '0100831';
		$state = '秋田県';
		$city = '秋田市';
		$street = '旭川清澄町２丁目３番５号';
		$tel = '09077778888';
		$sum_md5 = md5($user_id . $zip . $state . $city . $street . $tel);
		Address::create(compact('user_id', 'zip', 'state', 'city', 'street', 'tel', 'sum_md5'));

		$user_id = 4;
		$zip = '1420064';
		$state = '東京都';
		$city = '品川区';
		$street = '旗の台２－２－２';
		$tel = '09077778888';
		$sum_md5 = md5($user_id . $zip . $state . $city . $street . $tel);
		Address::create(compact('user_id', 'zip', 'state', 'city', 'street', 'tel', 'sum_md5'));

		$user_id = 5;
		$zip = '4880840';
		$state = '愛知県';
		$city = '尾張旭市';
		$street = '印旛元町４丁目３－１';
		$tel = '09011112222';
		$sum_md5 = md5($user_id . $zip . $state . $city . $street . $tel);
		Address::create(compact('user_id', 'zip', 'state', 'city', 'street', 'tel', 'sum_md5'));

		$user_id = 5;
		$zip = '1620825';
		$state = '東京都';
		$city = '新宿区';
		$street = '神楽坂２－７６';
		$tel = '09011112222';
		$sum_md5 = md5($user_id . $zip . $state . $city . $street . $tel);
		Address::create(compact('user_id', 'zip', 'state', 'city', 'street', 'tel', 'sum_md5'));
    }
}
