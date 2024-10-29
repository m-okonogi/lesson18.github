@extends('layouts.app')

@section('content')

<div class='container'>
  <h3 class='page-header'>新しく投稿する</h3>

  <!-- エラーメッセージの表示 -->

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- 新規投稿フォーム -->

  <form action="{{ url('post/create') }}" method="post">
    @csrf
    <div class="form-group">
      <input type="text" name="newContents" class="form-control" placeholder="投稿内容" required>
    </div>
    <button type="submit" class="btn btn-success pull-right">追加</button>
  </form>
</div>

@endsection
