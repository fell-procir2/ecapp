<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\GetAddressRequest;
use App\Address;
use App\User;

class AddressController extends Controller
{
	public function index() {
		$is_edit = false;
		$adds = (new Address)->allGet(Auth::id());
		return view('address.index', compact('is_edit', 'adds'));
	}
	public function reEdit(Request $request) {
		$old_input = $request->session()->get('_old_input');
		$adds = new Address;
		$adds->id = $old_input['id'];
		$adds->zip = $old_input['zip'];
		$adds->state = $old_input['state'];
		$adds->city = $old_input['city'];
		$adds->street = $old_input['street'];
		$adds->tel = $old_input['tel'];
		$is_edit = true;
		return view('address.index', compact('is_edit', 'adds'));
	}
	public function edit(Request $request) {
		$is_edit = true;
		$adds = (new Address)->findById($request->address_id);
		return view('address.index', compact('is_edit', 'adds'));
	}
	public function update(AddressRequest $request) {
		(new Address)->updateDb($request);
		return redirect()->route('address.index');
	}
	public function delete(Request $request) {
		(new Address)->softDeleteDb($request->address_id);
		return redirect()->route('address.index');
	}
	public function add(GetAddressRequest $request) {
		(new Address)->addDb($request);
		return redirect()->route('address.index');
	}
}
