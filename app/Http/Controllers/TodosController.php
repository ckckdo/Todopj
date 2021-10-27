<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    public function index()
    {
        $items=Todo::all();
        return view('index',['items'=>$items]);
    }


// Requestクラスにより作成されたHTTPリクエストインスタンスが$requestに代入される。
// $requestにはGETで受け取った情報が入っている。
    public function create(Request $request){
        $this->validate($request, Todo::$rules);
        $item = $request->all();
        Todo::create($item);
        return redirect('/');
    }

    public function update(Request $request){
        $this->validate($request, Todo::$rules);
        $item =$request->input(['id','content']);
        Todo::where('id', $request->id)->update(['content'=>$request->content]);
        return redirect('/');
    }

    public function delete(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
