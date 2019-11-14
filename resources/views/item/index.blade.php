@extends('layouts.mini_app')
@section('content')
<body>
<table>
<h1>商品一覧</h1>
	<tr style="background-color:#e3f0fb">
		<th>商品名</th>
		<th>価格</th>
		<th>在庫</th>
	</tr>
	@foreach ($items as $item)
		<tr style="background-color:#f5f5f5">
		<td><a href="{{ route('item.detail', ['id' => $item->id]) }}">{{ $item->name }}</td>
		<td align="right">{{ $item->price }}</td>
		@if (0 < $item->quantity)
			<td align="right">あり</td>
		@else
			<td align="right" style="background-color:#e0ffff">なし</td>
		@endif
		</tr>
	@endforeach
</table>
@role('admin')
	<br>
	<!-- 商品追加のリンク -->
	<form method="get" action="{{ route('item.edit') }}">
		{{ csrf_field() }}
		<button type="submit">新規作成</button>
	</form>
@endrole
</body>
@endsection
