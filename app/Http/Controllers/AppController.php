<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Process;

// モデル
use App\Models\User;
use App\Models\Data;

// バリデーション


class AppController extends Controller
{


    // データ表示(ALL:デバッグ用)
    public function showAll() {

        // ログインIDを取得

        // データ
        $data = Data::
        get()
        ;

        return view('output', compact('data'));
    }

    // データ表示(各ユーザごと)
        public function show() {

            // ログインIDを取得
            $show_id = auth()->id();

            // データ
            $data = Data::
            where('user_id', '=', $show_id)
            ->get()
            ;
    
            return view('output', compact('data'));
        }
        
    
    // データ個別表示
    public function display(Request $request) {

        // idを取得
        $data_id = $request->query('id');

        // データ表示
        $data = Data::
        where('id', '=', $data_id)
        ->get()
        ;

        return view('edit', compact('data'));
    }

    // データ編集
    public function update(Request $request) {

        $data_id = $request->query('data_id');

        // データベース編集
        $data = Data::find($data_id);

        $data->update([
            'id' => $data_id,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'deadline' => $request->input('deadline'),
        ]);


        return redirect('output');
    }
    
    public function input(Request $request) {

        // バリデーション
        $validated = $request->validate([
            'names.*' => 'required|string|max:50',
            'prices.*' => 'required|numeric',
            'quantitys.*' => 'required|numeric',
            'dates.*' => 'required|date',
            'deadlines.*' => 'nullable|date',
        ]);

        // フォームから送信されたデータを取得
        $names = $request->input('names');
        $prices = $request->input('prices');
        $quantitys = $request->input('quantitys');
        $dates = $request->input('dates');
        $deadlines = $request->input('deadlines');
        // ログインIDを取得
        $show_id = auth()->id();
        // データをデータベースに保存
        foreach ($names as $key => $name) {
            Data::create([
                
                'name' => $name,
                'price' => $prices[$key],
                'quantity' => $quantitys[$key],
                'date' => $dates[$key],
                'deadline' => $deadlines[$key] ?: null,
                'user_id' => $show_id,
            ]);
        }

        // データ
        $data = Data::
        where('user_id', '=', $show_id)
        ->get()
        ;

        return view('output', compact('data'));
    }

    // プログラム
    public function run(Request $request) {


        // dd($request->input('image'));
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 最大2MBまでの画像
        ]);

        // 画像
        $image = $request->file('image');
        
        $imageData = base64_encode(file_get_contents($image->getRealPath()));
        

        // プログラムのパス
        $pyScript = '/var/www/html/scripts/script.py';
        
        $cmd = "python3 ".$pyScript." ".$imageData." 2>&1";
        $output = shell_exec($cmd);

        $string = $output;
        $lines = explode("\n", $string);
        $data = [];
        foreach ($lines as $line) {
            $data[] = ['name' => $line];
        }

        // 出力を表示
        return view('upload', compact('data'));
    }



    
    public function upload(Request $request) {

        // バリデーション
        $validated = $request->validate([
            'names.*' => 'required|string|max:50',
            'prices.*' => 'required|numeric',
            'quantitys.*' => 'required|numeric',
            'dates.*' => 'required|date',
            'deadlines.*' => 'nullable|date',
        ]);

        // フォームから送信されたデータを取得
        $names = $request->input('names');
        $prices = $request->input('prices');
        $quantitys = $request->input('quantitys');
        $dates = $request->input('dates');
        $deadlines = $request->input('deadlines');
        // ログインIDを取得
        $show_id = auth()->id();
        // データをデータベースに保存
        foreach ($names as $key => $name) {
            Data::create([
                
                // 'id' => $id,
                'name' => $name,
                'price' => $prices[$key],
                'quantity' => $quantitys[$key],
                'date' => $dates[$key],
                'deadline' => $deadlines[$key] ?: null,
                'user_id' => $show_id,
            ]);
        }

        // データ
        $data = Data::
        where('user_id', '=', $show_id)
        ->get()
        ;

        return view('output', compact('data'));

    }

}
