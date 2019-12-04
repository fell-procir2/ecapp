<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = ['name', 'content', 'price', 'quantity'];
	//DBテーブルを指定
	protected $table = 'items';

	public function all_get() {
		return $this->all();
	}
	public function find_get($id) {
		return $this->find($id);
	}
	public function create_db($request) {
		$name = $request->input('name');
		$content = $request->input('content');
		$price = $request->input('price');
		$quantity = $request->input('quantity');
		$this->create(compact('name', 'content', 'price', 'quantity'));
	}
	public function update_db($id, $request) {
		$item = $this->findOrFail($id);
		$item->fill(['name' => $request->input('name')]);
		$item->fill(['content' => $request->input('content')]);
		$item->fill(['quantity' => $request->input('quantity')]);
		$item->save();
	}
}
