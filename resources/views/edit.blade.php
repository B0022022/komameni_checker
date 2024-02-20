@extends('layouts.home')
@section('title', '編集ページ')
@include('layouts.head')
@section('content')
  <div class="dis_center">
    <h1 class="henkou">編集中</h1>
    <div class="home">
      <form method="post" action="{{ route('update', ['data_id' => $data[0]['id']]) }}">
        @csrf
        <table id="sort_table" class="table1" contenteditable="true">
          <tr class="koumoku" contenteditable="false">
              <th>商品</th>
              <th>値段</th>
              <td>個数</td>
              <th>購入日</th>
              <th>賞味期限・消費期限</th>
          </tr>
          @foreach($data as $datum)
            <tr class="inputsize">
              <td><input name="name" type="text" required value="{{ $datum->name }}"></td>
              <td><input name="price" type="number" required value="{{ $datum->price }}"></td>
              <td><input name="quantity" type="number" required value="{{ $datum->quantity }}"></td>
              <td><input name="date" type="date" required value="{{ $datum->date }}"></td>
              <td><input name="deadline" type="date" value="{{ $datum->deadline }}"></td>
            </tr>
          @endforeach
        </table>
        <button class="save save_color save_hover" type="submit">保存</button>
      </form>

      <img src="image/マメ_データTOTAL.png" class="img">
    </div>
    <p class="inputsize">
      <input id="cav_com" class="change dec_button" type="button" value="編集完了" onclick="location.href='{{route('output')}}'">
      <input id="cav_can" class="change dec_button" type="button" value="編集取り消し" >
    </p>
  </div>
  <script src="js/script.js"></script>
@endsection
