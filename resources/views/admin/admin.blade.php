@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ダッシュボード</h1>
@stop

@section('content')
    @foreach ($admins as $admin)
    <p>{{ $admin }}</p>
@endforeach
@stop

@section('css')
    {{-- css per page
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop

@section('js')
    <script> console.log('JS per page'); </script>
@stop