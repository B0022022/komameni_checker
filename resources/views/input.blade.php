@extends('layouts.home')
@section('title', '入力ページ')
@include('layouts.head')
@section('content')
<a class="reverse" href="{{ route('top') }}"><<戻る</a>
    <div class="dis_center">
        <form method="POST" action="input">
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
                    <tr class="inputsize">
                        <td><input type="text" name="names[]" required></td>
                        <td><input type="number" name="prices[]"></td>
                        <td><input type="number" name="quantitys[]" required></td>
                        <td><input type="date" name="dates[]" required></td>
                        <td><input type="date" name="deadlines[]"></td>
                        <td><button type="button" class="remove-row">削除</button></td>
                    </tr>
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
