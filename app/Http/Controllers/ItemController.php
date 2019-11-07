<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//eloquent:Itemクラス宣言
use App\Item;

class ItemController extends Controller
{
    //商品一覧
    public function index()
    {
		$items = Item::all();
		return view('item.index', compact('items'));
		//debug
		//foreach ($items as $item) {
		//	echo $item->name . '<br>';
		//}
	}
	//商品詳細
	public function detail($id) {
		$item = Item::find($id);
		return view('item.detail', compact('item'));
	}
}
