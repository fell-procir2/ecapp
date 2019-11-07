@section('title', '商品一覧')
@section('body')
<table>
	<tr style="background-color:#e3f0fb">
		<th>商品名</th>
		<th>値段</th>
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
