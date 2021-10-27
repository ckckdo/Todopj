<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Todo List</title>
    <style>
      body{
        margin:0;
      }
      .container {
        width: 100vw;
        height:100%;
        background-color:#2d197c;
        padding-top:100px;
        padding-bottom:100px;
      }
      .card{
        width:50vw;
        height:auto;
        margin:0 auto;
        padding:30px;
        border-radius: 10px;
        background-color:#fff;
      }
      .ttl{
        font-size:24px;
        font-weight:bold;
      }
      .btn-create{
        text-align: left;
        border: 2px solid #dc70fa;
        font-size: 12px;
        color: #dc70fa;
        background-color: #fff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
      }
      .btn-create:hover{
        color: #fff;
        background-color: #dc70fa;
      }
      .form-create{
        width: 80%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        appearance: none;
        font-size: 14px;
        outline: none;
      }
      .create{
        display:flex;
        justify-content:center;
      }
      table{
        margin:0 auto;
      }
      @media screen and (max-width:768px){
        table{
          width:100%;
        }
        thead{
          display:none;
        }
        tr{
          margin-bottom:2px;
          display:block;
        }
        td{
          width:100%;
          display: block;
          text-align:right;
          padding:2px;
        }
        .th{
          display: block;
          font-size:14px;
          font-weight:bold;
          padding:10px;
        }
      table td:before {
        content:attr(data-label);
        float:left;
        font-weight: bold;
        }
      }
      .btn-update{
        text-align: left;
        border: 2px solid #fa9770;
        font-size: 12px;
        color: #fa9770;
        background-color: #fff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
      }
      .btn-update:hover{
        color: #fff;
        background-color: #fa9770;
      }
    .btn-delete{
      text-align: left;
        border: 2px solid #71fadc;
        font-size: 12px;
        color: #71fadc;
        background-color: #fff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
      }
      .btn-delete:hover{
        color: #fff;
        background-color: #71fadc;
      }

    @media screen and (max-width:768px){
      .btn-update,.btn-delete{
        font-size: 10px;
        padding: 3px 8px;
      }
      .todo-content{
        width:80%;
      }
      .time{
        font-size:8px;
      }
      table td:before {
            content:attr(data-label);
            float:left;
            font-weight: bold;
            font-size:10px;
      }
    }
</style>
</head>
  <body>
    <div class="container">
      <div class="card">
          <p class="ttl">Todo List</p>
        <div class="todo">
          <form action="/todo/create" method="post" class="create">
          @csrf
            <input type="text" name="content" class="form-create">
            <input type="submit" name="submit" value="追加" class="btn-create">
          </form>
          <table>
            <thead>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            </thead>

              @foreach($items as $item)
              <tr>
                <td data-label="作成日"><p class="time">{{$item->created_at}}</p></td>
                <form action="todo/create" method="post">@csrf
                <td data-label="タスク名"><input type="text" class="todo-content" value={{$item->content}}></td></form>
              <form action="todo/update" method="post">@csrf
                <td data-label="更新">
                <input type="hidden" name="id" value={{$item->id}}>
                <input type="hidden" name="content" value={{$item->content}}>
                <input type="submit" class="btn-update" value="更新">
              </form>
                </td>
                <td data-label="削除">
                <form action="todo/delete" method="post">@csrf
                  <input type="submit" class="btn-delete" value="削除">
              </form>
                </td>
              </tr>

              @endforeach
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
