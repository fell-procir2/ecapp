@section('title', '商品詳細')
@section('body')
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
<br>
<a href={{ route('item') }}>商品一覧に戻る</a>
