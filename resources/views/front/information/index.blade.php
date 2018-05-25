@extends('front.common.layout')

@section('title', 'おしらせ一覧 | SHOP STAFF LEARNING')
@section('description', '接客に役立つ情報をお知らせ')
@section('keyword', '福岡地所,ショップスタッフラーニング, SHOP STAFF LEARNING,接客')

@section('css')
@endsection

@include('front.common.header')

@section('content')
{{-- 以下がコンテンツエリア --}}
<?php
/**
 * Contents
 */
?>
<div class="page-top-visual">
  <p>お知らせ一覧</p>
<!-- /.page-top-visual --></div>

<section class="cmn-block">
  <header class="cmn-block-title">
    <h1 class="ttl-type02">
      <span class="ttltxt-en">Information</span>
      <span class="ttltxt-ja">お知らせ</span>
    </h1>
  </header>
  <div class="block-contents">
<?php
  //お知らせ一覧
  //10件でページ送り
?>
<ul class="cmn-item-list item-list-type02">
@if($informations->count())
    @foreach($informations as $information)
    <?php
        $new = "";
        //echo date('Y/m/d H:i:s',strtotime("-1 week"));
        if($information->open_date > date('Y/m/d H:i:s',strtotime("-1 week"))){
            $new = "<div class='icon-new'>NEW</div>";
        }

        $article = $information->article;
        $pattern = '/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i';
        $thumbImg = "";
        $thumbAlt = "";
        if(preg_match_all($pattern, $article,$img_texts)){
            $thumbImg = $img_texts[1][0];
            $thumbAlt = isset($img_texts[2][0])? $img_texts[2][0] : "";
        }

        $imagedetail = $stores_imgd[$information->store_id];
        $thumbStrImg = "";
        $thumbStrAlt = "";
        if(isset($imagedetail)){
            $imagedetail = json_decode($imagedetail, true);
            $thumbStrImg = $thumbStrAlt = $imagedetail[0]['filename'];
            $thumbStrImg = "/img/store/" . $information->store_id . "/" . $thumbStrImg;
            //echo "<pre>"; var_dump($thumbStrImg); echo "</pre>";
        }

        ?>
    <li>
      <a href="/information/detail/{{ $information->id }}">
        <div class="item-photo"><p><img src="{{ $thumbImg }}" alt="{{ $thumbAlt }}"></p></div>
        <div class="item-text">
          {!! $new !!}
          <p class="date">{{ $information->open_date }}</p>
          <p class="title">{{ $information->title }}</p>
          <p class="txt">{{ $information->sub_title }}</p>
        </div>
        <div class="item-logo">
          <p><img src="<?php echo $thumbStrImg; ?>" alt="<?php echo $thumbStrAlt; ?>"></p>
        </div>
      </a>
    </li>
    @endforeach
@else
@endif

</ul>

<div class="text-center">
{{ $informations->links() }}
</div>

<!--
<div class="cmn-pager">
  <ul>
    <li class="back"><a href="">BACK</a></li>
    <li class="next"><a href="">NEXT</a></li>
  </ul>
</div>
-->

<!-- /.block-contents --></div>
</section>


@endsection


@section('scripts')
@endsection


@include('front.common.footer')
