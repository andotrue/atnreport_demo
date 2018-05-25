@section('header')
<header class="cmn-header">
  <div class="header-in">
    <h1 class="site-logo">
      <span class="logo"><a href="/"><img src="/front/images/common/logo.png" alt=""></a></span>
	  <!-- <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a> -->

      <span class="txtlogo">LEARNING</span>
    </h1>
    <div class="hd-menu-block">
      <div class="page-view">
        <div class="vw-star">
          <span class="ico-star"></span><span class="star-num"></span>
        </div>
        <div class="vw-num">
          <span class="num">{{ isset($pvCount)? $pvCount : "0" }}</span>VIEW
        </div>
      <!-- /.page-view --></div>

      <div class="hd-menu">
        <div class="btn-menu"><a href="javascript:void(0)"><span></span><span></span><span></span></a></div>
      </div>
    <!-- /.hd-menu-block --></div>
<?php
  //ログイン/ログアウトボタン
?>
      <div class="hd-btn input-styles">
        @if (!Auth::check())
            <form id="login-form" action="{{ url('/login') }}" method="POST" style="display: block;">
                <input type="submit" name="" value="LOGIN" class="login">
            </form>
        @else
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: block;">
                <input type="submit" name="" value="LOGOUT" class="logout">
                {{ csrf_field() }}
                <span class="txtlogo">{{ Auth::user()->name }} </span>
            </form>
        @endif

      <!-- /.hd-btn --></div>
  <!-- /.header-in --></div>
</header>

<div class="hd-menu-contents">
  <div class="menu-contents">
    <p class="title">MENU</p>
    <p class="btn-close btn-close02"><span></span></p>
    <ul>
      <li class="menuItem"><a href="/skill/" class="menuLink">接客スキルを磨く</a></li>
      <li class="menuItem"><a href="/card/" class="menuLink">エフ・ジョイカードのススメ</a>
        <p class="title02">[ WEB・SNS接客を磨く]</p>
        <ul class="menuListChild">
          <li><a href="/webskill/detail/blogSNS_01">ブログ・SNSを接客に活用しよう</a></li>
          <li><a href="/webskill/detail/blogSNS_02">ブログ・SNS投稿 4ステップ</a></li>
          <li><a href="/webskill/detail/photo_01">撮影基本ステップ</a></li>
          <li><a href="/webskill/detail/photo_02">撮影の基本テクニック</a></li>
          <li><a href="/webskill/detail/writting_01">ブログ・SNSの書き方</a></li>
          <li><a href="/webskill/detail/writting_02">ブログの書き方-文章の流れ-</a></li>
          <li><a href="/webskill/detail/why_01">なぜブログ・SNSを書くのか</a></li>
          <li><a href="/webskill/detail/why_02">ブログ・SNSを接客に活用しよう</a></li>
        </ul>
      </li>
      <li class="menuItem"><a href="/information/" class="menuLink">お知らせ</a>
    </ul>
    <p class="btn-close btn-close01"><span>✕</span>CLOSE</p>
  <!-- /.menu-contents --></div>
<!-- /.hd-menu-contents --></div>
@endsection
