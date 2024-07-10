@extends('layout.app')
@section('meta')
    @if (App::getLocale() === 'en')
      <title> {{data_get($blog, 'seo_settings.meta_title', data_get($blog, 'title') )}} | {{data_get($page, 'settings.seo.title_en')}} </title>
    @else
      <title>{{data_get($blog, 'seo_settings.meta_title', data_get($blog, 'title'))}} | {{data_get($page, 'settings.seo.title_ge')}} </title>
    @endif

  <meta name="title" property="title" content="{{data_get($blog, 'seo_settings.meta_title', data_get($blog, 'title'))}}"/>
  <meta name="description"  property="description" content="{{data_get($blog, 'seo_settings.meta_description')}}"/>
  <meta name="keywords" content="{{data_get($blog, 'seo_settings.meta_keywords')}}">
  <meta property='pageUrl' content='{{url()->current()}}'/>
  <meta property='url' content='{{url()->current()}}'/>

  <meta property="og:title" content="{{data_get($blog, 'seo_settings.og_title', data_get($blog, 'title'))}}">
  <meta property="og:description" content="{{data_get($blog, 'seo_settings.og_description')}}">
  @if (data_get($blog, 'seo_settings.image'))
  <meta property="og:image" content="{{env('APP_URL') . '/storage/' . data_get($blog, 'seo_settings.image')}}">
  @else
  <meta property="og:image" content="{{env('APP_URL') . '/storage/' . data_get($blog, 'cover_image')}}">
  @endif

  <meta property="og:url" content="{{url()->current()}}">
@endsection

@section('content')
  {{-- Different Inner  --}}
  <x-blog-inner :general="$page" :blog="$blog" :categories="$categories" :recentnews="$recentnews"/>
@endsection
