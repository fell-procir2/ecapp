<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\facades\Auth;
use App\User;

class Address extends Model
{
	use SoftDeletes;
	protected $fillable = ['user_id', 'name', 'zip', 'state', 'city', 'street', 'tel', 'sum_md5'];
	protected $tabel = 'addresses';

	public function allGet($auth_id) {
		$adds = $this->where('user_id', $auth_id)->get();
		return $adds;
	}
	private function md5Address($req) {
		$sum_md5 = md5(Auth::id() . $req->zip . $req->state . $req->city . $req->street . $req->tel);
		return $sum_md5;
	}
	private function hasSameData($request) {
		$same_count = $this->where('sum_md5', $request->sum_md5)->count();
		if (0 < $same_count) {
			return true;
		}
		return false;
	}
	public function addDb($request) {
		$address = new Address;
		$sum_md5 = $this->md5Address($request);
		$request->merge(['user_id' => Auth::id()]);
		$request->merge(['sum_md5' => $sum_md5]);
		if ($this->hasSameData($request)) {
			set_message('同じお届け先が既に登録されています', false);
			return false;
		}
		$address->fill($request->all())->save();
		set_message('お届け先を登録しました');
		return true;
	}
	public function updateDb($request) {
		$id = $request->id;
		$address = $this->findOrFail($id);
		if ($address->user_id == Auth::id()) {
			$address->zip = $request->zip;
			$address->state = $request->state;
			$address->city = $request->city;
			$address->street = $request->street;
			$address->tel = $request->tel;
			$sum_md5 = $this->md5Address($address);
			$address->sum_md5 = $sum_md5;
			if ($this->hasSameData($address)) {
				set_message('同じお届け先が既に登録されています', false);
				return false;
			}
			$address->save();
			set_message('お届け先を変更しました');
			return true;
		}
		set_message('不正な操作です', false);
		return false;
	}
	public function findById($id) {
		$address = $this->findOrFail($id);
		if ($address->user_id == Auth::id()) {
			return $address;
		}
		set_message('不正な操作です', false);
		return new Address;
	}
	public function softDeleteDb($add_id) {
		$address = $this->find($add_id);
		if ($address->user_id == Auth::id()) {
			$address->delete();
			set_message('お届け先を削除しました');
			return true;
		}
		set_message('不正な操作です', false);
		return false;
	}
}
