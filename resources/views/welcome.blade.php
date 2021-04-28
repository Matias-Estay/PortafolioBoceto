@extends('layouts.app')
<style scoped>
body {
   background: url('/images/Primera_Slide.jpg');
   background-size: cover;
   display:flex; 
    flex-direction:column; 
}
footer{
    margin-top:auto;
}
</style>
@section('content')
    <router-view class="view"></router-view>
@endsection