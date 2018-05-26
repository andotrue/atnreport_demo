@section('header')
<header class="cmn-header">
  <div class="header-in">
    <h1 class="site-logo">
    	  <!-- ヘッダーロゴ -->
    	  <!--
      <span class="logo">
      	<a href="/"><img src="" alt=""></a>
      </span>
    	   -->
      <span class="txtlogo">ヘッダー</span>
    </h1>

    <div class="hd-menu-block">
      <div class="hd-menu">
        <div class="btn-menu"><a href="javascript:void(0)"><span></span><span></span><span></span></a></div>
      </div>
    <!-- /.hd-menu-block --></div>

<?php  //ログイン/ログアウトボタン　?>
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
      <li class="menuItem"><a href="/skill/" class="menuLink">menu1</a></li>
      <li class="menuItem"><a href="/card/" class="menuLink">menu2</a>
        <p class="title02">[ sub title ]</p>
        <ul class="menuListChild">
          <li><a href="/webskill/detail/blogSNS_01">menu2-1</a></li>
          <li><a href="/webskill/detail/blogSNS_02">menu2-2</a></li>
          <li><a href="/webskill/detail/photo_01">menu2-3</a></li>
          <li><a href="/webskill/detail/photo_02">menu2-4</a></li>
        </ul>
      </li>
      <li class="menuItem"><a href="/information/" class="menuLink">お知らせ</a>
    </ul>
    <p class="btn-close btn-close01"><span>✕</span>CLOSE</p>
  <!-- /.menu-contents --></div>
<!-- /.hd-menu-contents --></div>
@endsection
