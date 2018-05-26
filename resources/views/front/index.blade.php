@extends('front.common.layout')

@section('title', 'Front TOP')
@section('description', 'description')
@section('keyword', 'keyword')

@section('css')
@endsection

@include('front.common.header')

@section('content')

{{-- 以下コンテンツエリア --}}
<?php  //スライダー ?>
<section class="home-block-slider">
  <div class="main-slider">
    <div class="slider">
    </div>
  <!-- /.main-slider --></div>
</section>

<?php //お知らせ ?>
<section class="home-block home-block-info">
  <header class="cmn-block-title">
    <h1 class="ttl-type01">お知らせ</h1>
  </header>
  <div class="block-contents">
    <ul class="cmn-item-list item-list-type02">
    </ul>
    <div class="cmn-btn btn-type01"><a href="/information/">MORE</a></div>
  <!-- /.block-contents --></div>
</section>


@endsection


@section('scripts')
@endsection


@include('front.common.footer')
