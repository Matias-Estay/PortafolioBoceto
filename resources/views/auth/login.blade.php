@extends('layouts.app')
<style scoped>
body {
   background: url('/Imagenes/login.jpg');
   background-size: cover;
}
</style>
@section('content')
   <router-view  ruta_login="{{ route('login') }}" ruta_contraseña="{{ route('password.email') }}"/>
@endsection
