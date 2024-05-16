@extends('layout.app')

@section('meta')

  @php
      dd($project);
  @endphp
  <meta name="title" property="title" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_title', data_get($page, 'data.blocks.0.data.resource.title', data_get($page, 'data.seo_settings.meta_title')))}}"/>
  <meta name="description"  property="description" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_description', data_get($page, 'data.blocks.0.data.resource.teaser', data_get($page, 'data.seo_settings.meta_description')))}}"/>
  <meta property='pageUrl' content='{{url()->current()}}'/>
  <meta property='url' content='{{url()->current()}}'/>

  <meta property="og:title" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.og_title', data_get($page, 'data.blocks.0.data.resource.title', data_get($page, 'data.seo_settings.og_title')))}}">
  <meta property="og:description" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.og_description', data_get($page, 'data.blocks.0.data.resource.teaser', data_get($page, 'data.seo_settings.og_description')))}}">
  <meta property="og:image" content="{{'/storage/' . data_get($page, 'data.blocks.0.data.resource.seo_settings.image',  data_get($page, 'data.seo_settings.image'))}}">
  <meta property="og:url" content="{{url()->current()}}">
@endsection

@section('content')
  {{-- Different Inner  --}}

  <x-project-inner :general="$page" :project="$project"/>
@endsection
