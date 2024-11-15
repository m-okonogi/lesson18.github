@extends('layouts.app')

@section('content')

<div class='container'>

  <!-- 投稿ボタン -->
  <p class="pull-right"><a class="btn btn-success" href="/create-form">新規投稿</a></p>

  <!-- 検索バー -->
  <form action="{{ url('/index') }}">
    <div class="form-group">
      <input type="text" name="search" class="form-control" placeholder="キーワードを入力してください" value="{{ request('search') }}">
    </div>
    <button type="submit" class="btn btn-primary">検索</button>
  </form>

  <!-- 投稿一覧 -->
  <h3 class='page-header'>投稿一覧</h3>

  <!-- 検索結果が0件の場合 -->
  @if ($count === 0)

  <p>検索結果は0件です。</p>

  @else

  <table class='table table-hover'>
    <tr>
      <th>投稿No</th>
      <th>投稿者名</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
    </tr>
    @foreach ($lists as $list)
    <tr>
      <td>{{ $list->id }}</td>
      <td>{{ $list->user_name}}</td>
      <td>{{ $list->contents }}</td>
      <td>{{ $list->created_at }}</td>

      <!-- ログインユーザーが投稿したものに更新・削除ボタンを表示 -->
      @if (Auth::check() && Auth::user()->name === $list->user_name)
      <td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>
      <td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
      @endif
    </tr>
    @endforeach
  </table>
  @endif
</div>

@endsection
