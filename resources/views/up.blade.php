@extends('layouts.home')
@section('title', '読込ページ')
@include('layouts.head')
@section('content')
<a class="reverse" href="{{ route('top') }}"><<戻る</a>
<div class="dis_center">
    <h1 class="henkou">アップロード</h1>

    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class = up_button>
            <form method="post" action="{{ route('run') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" onchange="previewImage(this);" >
                <button type="submit" class="dec_button">保存</button>
            </form>
        </div>
        <p class="expression" >
            画像:<br>
            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
        </p>
    </div>
</div>
<script src="js/script.js"></script>
@endsection
