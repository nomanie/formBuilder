@extends('home/welcome')
@section('sidebar')
    @include('home/global/sidebar')
@endsection
@section('content')
    @include('home/views/groups/showOne')
@endsection
@section('footer')
    @include('home/global/footer')
@endsection
