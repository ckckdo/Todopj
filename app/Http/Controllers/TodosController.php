<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

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
        return view('index');
    }

    public function update(Request $request){
        $this->validate($request, Todo::$rules);
        $item = $request->all();
        Todo::update($item);
        return view('index');
    }

    public function delete(Request $request){
        $this->validate($request, Todo::$rules);
        $item = $request->id();
        Todo::delete($item);
        return redirect('index');
    }
}
