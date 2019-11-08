@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
					@role('admin')
                        <div class="alert alert-success">管理者様
					@endrole
					@role('customer')
						<div>お客様
					@endrole
                    のログインです。</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
