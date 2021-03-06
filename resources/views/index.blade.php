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
      p{
        padding: 0;
        margin:3px;
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
        width: 100%;
        margin-right:10px;
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
        margin-bottom:30px;
      }
      table{
        margin:0 auto;
        text-align:center;
      }
      tr{
        padding:0px;
      }
      td{
        padding:0 5px;
      }
      .time{
          font-size:14px;
          margin:0px;
        }
      .todo-content{
        padding:5px;
        border-radius: 5px;
        border: 1px solid #ccc;
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
          display: flex;
          justify-content:space-between;
          padding:2px;
        }
        .th{
          display: block;
          font-size:14px;
          font-weight:bold;
        }
        table td:before {
        content:attr(data-label);
        float: left;
        font-weight: bold;
        font-size:10px;
        line-height:20px;
        }
        .btn-update,.btn-delete{
        font-size: 10px;
        padding: 3px 8px;
        }
        .todo-content{
          width:60%;
        }
        .time{
          font-size:8px;
          margin:0px;
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
            <input type="submit" name="submit" value="??????" class="btn-create">
          </form>
          @if (count($errors) > 0)
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          @endif
          <table>
            <thead>
            <tr>
              <th>?????????</th>
              <th>????????????</th>
              <th>??????</th>
              <th>??????</th>
            </tr>
            </thead>

              @foreach($items as $item)
              <tr>
                <td data-label="?????????"><p class="time">{{$item->created_at}}</p></td>
                <form action="todo/update" method="post">@csrf
                <td data-label="????????????"><input type="text" name="content" class="todo-content" value={{$item->content}}></td>
                <td data-label="??????">
                <input type="hidden" name="id" value={{$item->id}}>
                <input type="submit" class="btn-update" value="??????">
              </form>
                </td>
                <td data-label="??????">
                <form action="todo/delete" method="post">@csrf
                  <input type="hidden" name="id" value={{$item->id}}>
                  <input type="submit" class="btn-delete" value="??????">
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
