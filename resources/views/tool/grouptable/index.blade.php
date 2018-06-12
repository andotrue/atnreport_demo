{{-- @{{extends('layouts.app')}} --}}
@extends('tool.common.layout')

@section('css')
	<link href="/css/jquery.dataTables/jquery.dataTables.min.css" rel="stylesheet">
	<link href="/css/jquery.dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="/css/jquery-ui/jquery-ui.min.css" rel="stylesheet">

	<style>
	tbody:hover {
	    cursor: move;
	}
	</style>
@endsection

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i>{{ $functionName }} {{ $functionSubName ? "-".$functionSubName."-" : "" }}
            <a class="btn btn-success pull-right" href="{{ route('grouptable.create') }}"><i class="glyphicon glyphicon-plus"></i> 作成</a>
        </h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($grouptables->count())
            	<!-- Paganation -->
            	{{ $grouptables->render() }}
                <!-- <table class="table table-condensed table-striped"> -->
                <table id="table_id" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">parent_user_id</th>
                            <th>child_user_id</th>
                            <th class="text-right" width="3%"></th>
                        </tr>
                    </thead>
                    <tbody class="jquery-ui-sortable-table">
                        @foreach($grouptables as $grouptable)
                            <tr>
                                <td>{{$grouptable->parent_user_id}}</i></td>
                                <td>{{$grouptable->child_user_id}}</i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Paganation -->
                {!! $grouptables->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>


@endsection


@section('scripts')
@endsection
