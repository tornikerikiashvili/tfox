@extends('layout.app')


@section('content')
  {{-- Different Inner  --}}
  <x-product-inner :general="$page" :product="$product" :categories="$categories"/>
@endsection
