@extends('layouts.app')
<style scoped>
body {
   background: url('/Imagenes/login.jpg');
   background-size: cover;
}
</style>
@section('content')
   <router-view  ruta="{{ route('register') }}"/>
@endsection
