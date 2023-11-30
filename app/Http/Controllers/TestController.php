<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test; // Testモデルを使えるように読み込む
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
	public function index()
	{
		dd('test');
		
		// Eloquent(エロクアント)
		$values = Test::all(); // 全件取得

		$count = Test::count(); //件数取得 

		$first = Test::findOrFail(1); // 

		$whereBBB = Test::where('text', '=', 'bbb')->get();

		//クエリビルダ
		$queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
		->select('id', 'text')
		->get();

		dd($values, $count, $first, $whereBBB, $queryBuilder); // die + var_dump 処理を止めて内容を確認できる

		return view('tests.test', compact('values'));
		//compact関数でView側に変数を渡すと楽
		// 変数が複数あってもコンマでつなげば複数渡せる

		// return view('tests.test'); // viewはLaravelのヘルパ関数 フォルダ名.ファイル名
	}
}
