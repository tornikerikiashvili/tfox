@extends('layout.app')

@section('meta')
    @if (App::getLocale() === 'en')
      <title> {{data_get($project, 'seo_settings.meta_title', data_get($project, 'title.main') )}} | {{data_get($page, 'settings.seo.title_en')}} </title>
    @else
      <title>{{data_get($project, 'seo_settings.meta_title', data_get($project, 'title.main'))}} | {{data_get($page, 'settings.seo.title_ge')}} </title>
    @endif

  <meta name="title" property="title" content="{{data_get($project, 'seo_settings.meta_title', data_get($project, 'title.main'))}}"/>
  <meta name="description"  property="description" content="{{data_get($project, 'seo_settings.meta_description')}}"/>
  <meta name="keywords" content="{{data_get($project, 'seo_settings.meta_keywords')}}">
  <meta property='pageUrl' content='{{url()->current()}}'/>
  <meta property='url' content='{{url()->current()}}'/>

  <meta property="og:title" content="{{data_get($project, 'seo_settings.og_title', data_get($project, 'title.main'))}}">
  <meta property="og:description" content="{{data_get($project, 'seo_settings.og_description')}}">
  @if (data_get($project, 'seo_settings.image'))
  <meta property="og:image" content="{{'/storage/' . data_get($project, 'seo_settings.image')}}">
  @else
  <meta property="og:image" content="{{data_get($project, 'cover_image.url')}}">
  @endif

  <meta property="og:url" content="{{url()->current()}}">
@endsection

@section('content')
  {{-- Different Inner  --}}

  <x-project-inner :general="$page" :project="$project"/>
@endsection
