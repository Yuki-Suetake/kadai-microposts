// ユーザ一覧を表示
@extends('layouts.app')

@section('content')
    @include('users.users', ['users' => $users])
@endsection