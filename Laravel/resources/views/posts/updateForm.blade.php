@extends('layouts.app')

@section('content')


<div class='container'>
  <h3 class='page-header'>投稿内容を変更する</h3>

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

  <!-- 投稿編集フォーム -->
  <form action="{{ url('/post/{id}/update') }}" method="POST">
    @csrf
    <div class="form-group">
      <input type="hidden" name="id" value="{{ $contents->id }}">
      <input type="text" name="upContents" value="{{ $contents->contents }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary pull-right">更新</button>
  </form>
</div>

@endsection
