@extends('layout.app')

@section('meta')
    @if (App::getLocale() === 'en')
      <title> {{data_get($product, 'seo_settings.meta_title', data_get($product, 'name') )}} | {{data_get($page, 'settings.seo.title_en')}} </title>
    @else
      <title>{{data_get($product, 'seo_settings.meta_title', data_get($product, 'name'))}} | {{data_get($page, 'settings.seo.title_ge')}} </title>
    @endif

  <meta name="title" property="title" content="{{data_get($product, 'seo_settings.meta_title', data_get($product, 'name'))}}"/>
  <meta name="description"  property="description" content="{{data_get($product, 'seo_settings.meta_description')}}"/>
  <meta name="keywords" content="{{data_get($product, 'seo_settings.meta_keywords')}}">
  <meta property='pageUrl' content='{{url()->current()}}'/>
  <meta property='url' content='{{url()->current()}}'/>

  <meta property="og:title" content="{{data_get($product, 'seo_settings.og_title', data_get($product, 'name'))}}">
  <meta property="og:description" content="{{data_get($product, 'seo_settings.og_description')}}">
  @if (data_get($product, 'seo_settings.image'))
  <meta property="og:image" content="{{'/storage/' . data_get($product, 'seo_settings.image')}}">
  @else
  <meta property="og:image" content="{{data_get($product, 'cover_image.url')}}">
  @endif

  <meta property="og:url" content="{{url()->current()}}">
@endsection

@section('content')
  {{-- Different Inner  --}}
  <x-product-inner :general="$page" :product="$product" :categories="$categories"/>
@endsection
