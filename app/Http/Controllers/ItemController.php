<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Item; //eloquent

class ItemController extends Controller
{
    public function index() {
		session(['id' => '']);
		$items = Item::all();
		return view('item.index', compact('items'));
	}
	public function detail($id) {
		session(['id' => $id]);
		$item = Item::find($id);
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
		//追加処理
		$name = $request->input('name');
		$content = $request->input('content');
		$price = $request->input('price');
		$quantity = $request->input('quantity');
		$item = Item::create(compact('name', 'content', 'price', 'quantity'));
		return redirect(route('item.index'))->with('message', '商品を追加しました。');
	}
	public function update(ItemRequest $request) {
		$id = session('id');
		//編集処理
		$item = Item::findOrFail($id);
		$item->fill(['name' => $request->input('name')]);
		$item->fill(['content' => $request->input('content')]);
		$item->fill(['quantity' => $request->input('quantity')]);
		$item->save();
		return redirect(route('item.detail', ['id' => $id]))->with('message', '内容を修正しました。');
	}
}
