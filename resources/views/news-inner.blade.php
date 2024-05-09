@extends('layout.app')


@section('content')
  {{-- Different Inner  --}}
  <x-news-inner :general="$page" :news="$news" :categories="$categories" :recentnews="$recentnews"/>
@endsection
