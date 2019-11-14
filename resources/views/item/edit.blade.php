@extends('layouts.mini_app')
@section('content')
<?php $is_validation_error = $errors->any() ?>
@if ($is_validation_error)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	<?php
	$name = old('name');
	$content = old('content');
	$price = old('price');
	$quantity = old('quantity');
	?>
@endif
<?php $is_create = (session('id') == ''); ?>
@if ($is_create)
	<?php $address = 'item.create'; ?>
	<h1>{{ '新規登録' }}</h1>
@else
	<?php $address = 'item.update'; ?>
	<h1>{{ '商品編集' }}</h1>
@endisset
<body>
	<form method="post" action="{{ route($address) }}">
		{{ csrf_field() }}
		<div><label>商品名:</label> <input type="text" name="name" value="{{ $name }}"></div>
		<div><label>説明:</label> <textarea name="content">{{ $content }}</textarea></div>
		@if ($is_create)
			<div><label>値段:</label> <input type"text" name="price" value="{{ $price }}"></div>
		@else
			<div><input type="hidden" name="price" value="{{ $price }}"></div>
		@endif
		<div><label>在庫:</label> <input type="text" name="quantity" value="{{ $quantity }}"></div>
		<div><button type="submit">登録</button></div>
	</form>
	<h2><a href="{{ route('item.index') }}">商品一覧へ戻る</a></h2>
</body>
@endsection
