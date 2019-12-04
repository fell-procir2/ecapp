@extends('layouts.mini_app')
@section('content')
<body>
	<h1>商品詳細</h1>
	<table>
		<tr><th align="left" style="background-color:#e3f0fb">商品名:</th><td>{{ $item->name }}</td></tr>
		<tr><th align="left" style="background-color:#e3f0fb">商品説明:</th><td>{{ $item->content }}</td></tr>
		<tr><th align="left" style="background-color:#e3f0fb">価格:</th><td>{{ $item->price }}</td></tr>
		<tr><th align="left" style="background-color:#e3f0fb">在庫:</th>
		@if (0 < $item->quantity)
			<td>あり</td>
		@else
			<td style="background-color:#e0ffff">なし</td>
		@endif
		</tr>
	</table>
	@role('admin')
		<br>
		<form method="post" action="{{ route('item.edit') }}">
			{{ csrf_field() }}
			<input type="hidden" name="name" value="{{ $item->name }}">
			<input type="hidden" name="content" value="{{ $item->content }}">
			<input type="hidden" name="price" value="{{ $item->price }}">
			<input type="hidden" name="quantity" value="{{ $item->quantity }}">
			<button type="submit">商品の編集</button>
		</form>
	@endrole
	@auth
		@role('customer')
			<br>
			@if (0 < $item->quantity)
				<form method="post" action="{{ route('cart.add') }}">
					{{ csrf_field() }}
					<button type="submit">カートに入れる</button>
				</form>
			@else
				<h2>在庫がありません</h2>
			@endif
		@endrole
	@else
		<br>
		<h2>ログインしてください。</h2>
	@endauth
	<h2><a href="{{ route('item.index') }}">商品一覧へ戻る</a></h2>
</body>
@endsection
