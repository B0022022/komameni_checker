@extends('layouts.home')
@section('title', 'トップページ')
@include('layouts.head')
@section('content')
  <div class="dis_center">
    <h1 class="title">こまめにチェッカー</h1>
    <div class="home">
      <img src="image/お知らせ.png" class="img">
      <div class="allmenu">
        <div class="menu">
          <h2>メニュー</h2>
          <div class="item">
            @auth
            <a style="text-decoration:none;" href="{{ route('output_user') }}">出力ページ</a><br>
            <a style="text-decoration:none;" href="{{ route('up') }}">画像をアップロード</a><br>
            <a style="text-decoration:none;" href="{{ route('input') }}">直接入力</a><br>
            @endauth
            <a style="text-decoration:none;" href="{{ route('help') }}">ヘルプ</a><br>

          </div>
        </div>
        @auth
        @if($deadline_before->isNotEmpty())
          <div class="menu">
            <h2>賞味期限があと少し</h2>
            <div class="item redcolor">
                @foreach($deadline_before as $item)
                  <th>{{ $item->name }}</th><br>
                @endforeach
            </div>
          </div>
        @endif

        @if($deadline_after->isNotEmpty())
        <div class="menu">
          <h2>期限切れ</h2>
          <div class="item redcolor">
            @foreach($deadline_after as $item)
              <th>{{ $item->name }}</th><br>
            @endforeach
          </div>
        </div>
        @endif
        @endauth
        <div class="menu">
          <h2>アップデート情報</h2>
          <div class="item">
            <td nowrap> |アップデート情報を記載しています|</td><br>
            <th>豆蔵のグレードアップ</th><br>
          </div>
        </div>
      </div>
@endsection
    </div>
  </div>
