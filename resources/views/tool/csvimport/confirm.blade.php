{{-- @{{extends('layouts.app')}} --}}
@extends('tool.common.layout')

@section('css')
	<link type="text/css" rel="stylesheet" href="/css/jquery.filthypillow/jquery.filthypillow.css" />
@endsection

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i>{{ $functionName }} {{ $functionSubName ? "-".$functionSubName."-" : "" }}
            <a class="btn btn-success pull-right" href="{{ route('user.create') }}"><i class="glyphicon glyphicon-plus"></i> 作成</a>
        </h1>
    </div>
@endsection

@section('content')
    @include('error')

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
	@endif

    <div class="row">
        <div class="col-md-12">
			<?php foreach($registration_list as $val){ ?>
			<div><?php var_dump($val); ?></div>
			<?php } ?>
        </div>
    </div>
@endsection


@section('scripts')
	<script charset="UTF-8" type="text/javascript" src="/js/moment.js"></script>
	<script charset="UTF-8" type="text/javascript" src="/js/jquery.filthypillow/jquery.filthypillow_custom.js"></script>
	<script>
	</script>

@endsection
