@extends('layouts.app')
@section('content')
{{ session()->get('user')->user->name }}

Estas logueado
@endsection
