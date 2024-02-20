@extends('layouts.home')
@section('title', '表示ページ')
@include('layouts.head')
@section('content')
  <a class="reverse" href="{{ route('top') }}"><<戻る</a>
  <div class="dis_center">
    <div class="home">
      <table id="sort_table" class="table1">
        <tr class="koumoku">
            <th>商品</th>
            <th>値段</th>
            <th>購入日</th>
            <th>個数</th>
            <th>賞味期限・消費期限</th>
        </tr>

      <!-- データベースから出力　-->
        
        @foreach($data as $datum)
        <tr>
            <td>{{ $datum->name }}</td>
            <td>{{ $datum->price }}</td>
            <td>{{ $datum->date }}</td>
            <td>{{ $datum->quantity }}</td>
            <td>{{ $datum->deadline }}</td>   
            <td>
              <a href="{{ route('display', ['id' => $datum->id]) }}">
              <button>
                編集
              </button>
            </td>
        </tr>
        @endforeach
    
      </table>
      <img src="image/豆蔵上側.png" class="img">
    </div>
  </div>
  <script src="js/script.js"></script>
@endsection
