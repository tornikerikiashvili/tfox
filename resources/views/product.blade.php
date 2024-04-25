@extends('layout.app')


@section('content')
  <x-product-inner :general="$page" :product="$product" :categories="$categories"/>
@endsection
