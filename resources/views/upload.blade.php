@extends('layouts.home')
@section('title', '入力ページ')
@include('layouts.head')
@section('content')
<a class="reverse" href="{{ route('top') }}"><<戻る</a>
    <div class="dis_center">
        <form method="POST" action="upload">
            @csrf
            <table id="data-table">
                <thead>
                    <tr>
                        <th>名前※</th>
                        <th>値段※</th>
                        <th>個数※</th>
                        <th>購入日※</th>
                        <th>期限</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $datum)
                    <tr class="inputsize">
                        <td><input name="names[]" type="text" required value="{{ $datum['name']}}"></td>
                        <td><input name="prices[]" type="number" required></td>
                        <td><input name="quantitys[]" type="number" required></td>
                        <td><input name="dates[]" type="date" required></td>
                        <td><input name="deadlines[]" type="date"></td>
                        <td><button type="button" class="remove-row">削除</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="save2">
                <button class="dec_button" type="button" id="add-row">行追加</button>
                <button class="dec_button" type="submit">保存</button>
            </div>
        </form>
    </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
    // 行追加ボタンのクリック時の処理
    $("#add-row").click(function() {
        var newRow = $("#data-table tbody tr:first").clone();
        newRow.find('input').val(''); // 新しい行のinputをクリア
        $("#data-table tbody").append(newRow);
    });

    // 行削除ボタンのクリック時の処理
    $("#data-table").on("click", ".remove-row", function() {
        $(this).closest("tr").remove();
    });
  });
  </script>
@endsection
