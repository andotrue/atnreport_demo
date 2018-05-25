@extends('front.common.layout')

@section('css')
@endsection

@include('front.common.header')

@section('content')
{{-- 以下がコンテンツエリア --}}
<section class="cmn-block">
  <header class="cmn-block-title">
    <h1 class="ttl-type02">
      <span class="ttltxt-en">Information</span>
      <span class="ttltxt-ja">お知らせ</span>
    </h1>
  </header>
  <div class="block-contents">
<?php
  //記事詳細
  //ロゴは160×160
  //本文中の画像は最大横700縦なり
  //入力がない項目は「div.detail-box」ごと非表示でお願いします。
?>
@if($information->count())
    <?php
        $information = $information[0];
        $new = "";
        //echo date('Y/m/d H:i:s',strtotime("-1 week"));
        if($information->open_date > date('Y/m/d H:i:s',strtotime("-1 week"))){
            $new = "<p class='icon-new'>NEW</p>";
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
        
        //echo "<pre>"; var_dump($store_name[$information->store_id]); echo "</pre>";
    ?>
    <article class="detail">
      <header class="detail-title">
        <div class="logo">
          <p><img src="{{ $thumbStrImg }}" alt="{{ $thumbStrAlt }}"></p>
        </div>
        <div class="text">
          <div class="date">{!! $new !!}<span>{{ $information->open_date }}</span></div>
          <h1>{{ $information->title }}</h1>
        </div>
      </header>
      <div class="detail-box box-sub-ttl">
        {{ $information->sub_title }}
      <!-- /.detail-box --></div>
      <?php // 本文 //?>
      <div class="detail-box box-entry">
        {!! $information->article !!}
      <!-- /.detail-box --></div>

    <div class="detail-box box-link">
        <ul>
        <?php
            $pdffile_datas = @json_decode($information->pdffile_names, true);
            $cnt = 3;
        ?>
        @for($i=1; $i<=$cnt; $i++)
        <?php
            $pdf_url = "";
            $pdf_title = "";
            if(isset($pdffile_datas[$i-1])){
                $pdf_url = "/pdf/" . $information->id . "/". @$pdffile_datas[$i-1]['filename'];
                $pdf_title = @$pdffile_datas[$i-1]['pdftitle'];
                $pdf_title = ($pdf_title)? $pdf_title : @$pdffile_datas[$i-1]['filename'] ;

                echo "<li><a href='".$pdf_url."' target='_blank'>" . $pdf_title . "</a></li>";
            }
        ?>
        @endfor
        </ul>
    <!-- /.detail-box --></div>

<!-- /.detail --></article>

@else
@endif


    <div class="cmn-pager">
      <ul>
        @if(isset($prev_info))
        <li class="back"><a href="/information/detail/{{ $prev_info->id }}">BACK</a></li>
        @endif
        @if(isset($next_info))
        <li class="next"><a href="/information/detail/{{ $next_info->id }}">NEXT</a></li>
        @endif
      </ul>
    </div>
  <!-- /.block-contents --></div>
</section>


@endsection

@section('title', "おしらせ詳細 | ".@$information->title." | ".@$store_name[$information->store_id]." | SHOP STAFF LEARNING")
@section('description', '接客に役立つ情報をお知らせ')
@section('keyword', '福岡地所,ショップスタッフラーニング, SHOP STAFF LEARNING,接客')


@section('scripts')
@endsection


@include('front.common.footer')
