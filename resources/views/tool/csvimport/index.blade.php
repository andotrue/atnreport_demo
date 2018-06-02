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
    <div class="row">
 		<form action="{{ route('csvimport.store') }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-md-12">
			<?php
			$cnt = 1;//FILEアップローダフィールドの数
			for($i=1; $i<=$cnt; $i++){
			?>
			<div class="form-group @if($errors->has("csvfile".$i)) has-error @endif">
			   <label for="csvfile<?php echo $i; ?>-field">アップロードするファイルを選択してください。<span class="btn-xs btn-danger">必須</span></label>
			      <input type="file" name="csvfile<?php echo $i; ?>" id="filer_input<?php echo $i; ?>" multiple="multiple">
			       @if($errors->has("csvfile".$i))
			        <span class="help-block">{{ $errors->first("csvfile$i") }}</span>
			       @endif
			</div>
			<?php } ?>
        </div>

		<div class='col-md-12'>
			<div class="well well-sm">
			    <button type="submit" class="btn btn-primary">アップロード</button>
			    <a class="btn btn-link pull-right" href="{{ route('csvimport.index') }}"><span class="glyphicon glyphicon-backward"></span> 戻る</a>
			</div>
		</div>
		</form>

    </div>
@endsection


@section('scripts')
	<script charset="UTF-8" type="text/javascript" src="/js/moment.js"></script>
	<script charset="UTF-8" type="text/javascript" src="/js/jquery.filthypillow/jquery.filthypillow_custom.js"></script>
	<script>
	</script>

@endsection
