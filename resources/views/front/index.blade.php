@extends('front.common.layout')

@section('title', '福岡地所 | SHOP STAFF LEARNING')
@section('description', 'お手本接客やWeb活用ノウハウが学べるショップスタッフ接客応援サイト')
@section('keyword', '福岡地所,ショップスタッフラーニング, SHOP STAFF LEARNING,接客')

@section('css')
@endsection

@include('front.common.header')

@section('content')
{{-- 以下がコンテンツエリア --}}
<?php
  //スライダー
  //画像サイズ640×たてなり
?>
<section class="home-block-slider">


  <div class="main-slider">
    <div class="slider">
    </div>
  <!-- /.main-slider --></div>
</section>

<?php
  //キャッチ
?>
<section class="home-block-catch">
  <div class="block-contents">
    <div class="catch-txt">お客様をファンにするヒントがたくさん詰まった学べる&amp;お役立ちポータルサイト。</div>
  <!-- /.block-contents --></div>
</section>

<?php
  //ロールプレイング
?>
<section class="home-block home-block-roleplaying">
  <header class="cmn-block-title">
    <h1 class="ttl-type01">接客スキルを磨く</h1>
  </header>
  <div class="block-catch"><span>優秀スタッフの接客スタイルを公開！</span></div>
  <div class="block-contents">
    <h2 class="cont-ttl-type01">接客ロールプレイング</h2>
    <ul class="cmn-item-list item-list-type01">

      <li>
        <a href="/skill/detail/9">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img09.jpg" alt="SC接客ロールプレイングコンテスト九州・沖縄大会　キャナルシティ博多　ロックポート ストア"></p></div>
        <div class="item-text">
          <p class="date">2017.1.5</p>
          <p class="title"><span style="color: #d60011;">[ NEW ] </span>SC接客ロールプレイングコンテスト九州・沖縄大会　キャナルシティ博多　ロックポート ストア</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/8">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img08.jpg" alt="SC接客ロールプレイングコンテスト九州・沖縄大会　木の葉モール橋本　カルディコーヒーファーム"></p></div>
        <div class="item-text">
          <p class="date">2017.1.5</p>
          <p class="title"><span style="color: #d60011;">[ NEW ] </span>SC接客ロールプレイングコンテスト九州・沖縄大会　木の葉モール橋本　カルディコーヒーファーム</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/2">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img02.jpg" alt="SC接客ロールプレイングコンテス2016特訓会　マリノアシティ福岡 ゾフ（アイウェア）"></p></div>
        <div class="item-text">
          <p class="date">2016.12.1</p>
          <p class="title">SC接客ロールプレイングコンテス2016特訓会　マリノアシティ福岡 ゾフ（アイウェア）</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/3">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img03.jpg" alt="SC接客ロールプレイングコンテス2016特訓会　マリノアシティ福岡 レゴ クリックブリック（玩具・アパレル・グッズ）"></p></div>
        <div class="item-text">
          <p class="date">2016.12.1</p>
          <p class="title">SC接客ロールプレイングコンテス2016特訓会　マリノアシティ福岡 レゴ クリックブリック（玩具・アパレル・グッズ）</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/6">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img06.jpg" alt="SC接客ロールプレイングコンテス2016特訓会　マリノアシティ福岡 フクスケ アウトレット（レッグウェア・インナーウェア）"></p></div>
        <div class="item-text">
          <p class="date">2016.12.1</p>
          <p class="title">SC接客ロールプレイングコンテス2016特訓会　マリノアシティ福岡 フクスケ アウトレット（レッグウェア・インナーウェア）</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/5">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img05.jpg" alt="SC接客ロールプレイングコンテス2016特訓会　木の葉モール橋本カルディコーヒーファーム(コーヒー豆・輸入食品)"></p></div>
        <div class="item-text">
          <p class="date">2016.12.1</p>
          <p class="title">SC接客ロールプレイングコンテス2016特訓会　木の葉モール橋本カルディコーヒーファーム(コーヒー豆・輸入食品)</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/4">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img04.jpg" alt="SC接客ロールプレイングコンテス2016特訓会　木の葉モール橋本 パレットプラザ(DPE)"></p></div>
        <div class="item-text">
          <p class="date">2016.12.1</p>
          <p class="title">SC接客ロールプレイングコンテス2016特訓会　木の葉モール橋本 パレットプラザ(DPE)</p>
        </div>
        </a>
      </li>

      <li>
        <a href="/skill/detail/7">
        <p class="ico-roleplaying"><img src="/front/images/common/txt-roleplaying.png" alt="Role Playing"></p>
        <div class="item-photo"><p><img src="/front/images/skill/img07.jpg" alt="SC接客ロールプレイングコンテス2016特訓会　SC接客ロールプレイングコンテス2016特訓会"></p></div>
        <div class="item-text">
          <p class="date">2016.12.1</p>
          <p class="title">SC接客ロールプレイングコンテス2016特訓会　リバーウォーク北九州 サリア（レディス）</p>
        </div>
        </a>
      </li>

    </ul>
    <div class="cmn-btn btn-type01"><a href="/skill/">MORE</a></div>
  <!-- /.block-contents --></div>
</section>
<?php
  //バナー
?>
<section class="home-block home-block-bnr">
  <div class="block-contents">
    <ul>
        <li><a href="/card/"><img src="/front/images/common/bnr-fjoycard.png" alt="メインバナーダミー4"></a></li>
    </ul>
  <!-- /.block-contents --></div>
</section>
<?php
  //接客
?>
<section class="home-block home-block-service">
  <header class="cmn-block-title">
    <h1 class="ttl-type01">WEB・SNS接客を磨く</h1>
  </header>
  <div class="block-catch"><span>接客は来店前から始まっている。</span></div>
  <div class="block-contents">
    <div class="box">
      <h2 class="cont-ttl-type01">基礎編</h2>
      <ul class="cmn-item-list item-list-type01">
        <li>
          <a href="/webskill/detail/blogSNS_01">
          <div class="service-nav">
            <p class="icon"><img src="/front/images/common/ico-pc02.png" alt="ブログ・SNSを接客に活かす"></p>
            <p class="txt">ブログ・SNSを<br>接客に活かす</p>
          </div>
          </a>
        </li>
        <li>
          <a href="/webskill/detail/photo_01">
          <div class="service-nav">
            <p class="icon"><img src="/front/images/common/ico-camera.png" alt="撮影の基本"></p>
            <p class="txt">撮影の基本</p>
          </div>
          </a>
        </li>
        <li>
          <a href="/webskill/detail/writting_01">
          <div class="service-nav">
            <p class="icon"><img src="/front/images/common/ico-pen.png" alt="文章の書き方"></p>
            <p class="txt">文章の書き方</p>
          </div>
          </a>
        </li>
        <li>
          <a href="/webskill/detail/why_01">
          <div class="service-nav">
            <p class="icon"><img src="/front/images/common/ico-beginner.png" alt="WEBの基礎知識"></p>
            <p class="txt">WEBの基礎知識</p>
          </div>
          </a>
        </li>
      </ul>
    <!-- /.box --></div>
    <div class="box">
      <h2 class="cont-ttl-type01">応用編</h2>
      <div class="comingsoon"><img src="/front/images/common/comingsoon.png" alt="Coming Soon"></div>
    <!-- /.box --></div>
  <!-- /.block-contents --></div>
</section>
<?php
  //お知らせ
  //サムネイルサイズは150×150で中心からトリミング
  //ショップロゴは110×110
?>
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
