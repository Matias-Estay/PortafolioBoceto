@extends('layouts.vue')
@section('content')
    <router-view logout="{{ route('logout') }}"></router-view>
@endsection