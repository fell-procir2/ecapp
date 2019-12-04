<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Item; //eloquent

class ItemController extends Controller
{
    public function index() {
		session(['id' => '']);
		$items = (new Item)->all_get();
		return view('item.index', compact('items'));
	}
	public function detail($id) {
		session(['id' => $id]);
		$item = (new Item)->find_get($id);
		return view('item.detail', compact('item'));
	}
	public function edit(Request $request) {
		$name = $request->input('name');
		$content = $request->input('content');
		$price = $request->input('price');
		$quantity = $request->input('quantity');
		return view('item.edit', compact('name', 'content', 'price', 'quantity'));
	}
	public function create(ItemRequest $request) {
		(new Item)->create_db($request);
		set_message('商品を追加しました。');
		return redirect(route('item.index'));
	}
	public function update(ItemRequest $request) {
		$id = session('id');
		(new Item)->update_db($id, $request);
		set_message('内容を修正しました。');
		return redirect(route('item.detail', ['id' => $id]));
	}
}
