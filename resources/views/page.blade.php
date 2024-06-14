@extends('layout.app')


@section('meta')
@if (App::getLocale() === 'en')
<title>{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_title', data_get($page, 'data.blocks.0.data.resource.title', data_get($page, 'data.seo_settings.meta_title')))}} | {{data_get($page, 'settings.seo.title_en')}} </title>
@else
<title>{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_title', data_get($page, 'data.blocks.0.data.resource.title', data_get($page, 'data.seo_settings.meta_title')))}} | {{data_get($page, 'settings.seo.title_ge')}} </title>
@endif


  <meta name="title" property="title" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_title', data_get($page, 'data.blocks.0.data.resource.title', data_get($page, 'data.seo_settings.meta_title')))}}"/>
  <meta name="description"  property="description" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_description', data_get($page, 'data.blocks.0.data.resource.teaser', data_get($page, 'data.seo_settings.meta_description')))}}"/>
  <meta name="keywords"  property="keywords" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.meta_keywords', data_get($page, 'data.blocks.0.data.resource.teaser', data_get($page, 'data.seo_settings.meta_keywords')))}}"/>
  <meta property='pageUrl' content='{{url()->current()}}'/>
  <meta property='url' content='{{url()->current()}}'/>

  <meta property="og:title" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.og_title', data_get($page, 'data.blocks.0.data.resource.title', data_get($page, 'data.seo_settings.og_title')))}}">
  <meta property="og:description" content="{{data_get($page, 'data.blocks.0.data.resource.seo_settings.og_description', data_get($page, 'data.blocks.0.data.resource.teaser', data_get($page, 'data.seo_settings.og_description')))}}">
  <meta property="og:image" content="{{'/storage/' . data_get($page, 'data.blocks.0.data.resource.seo_settings.image',  data_get($page, 'data.seo_settings.image'))}}">
  <meta property="og:url" content="{{url()->current()}}">
@endsection

@section('content')

@if (data_get($page, 'data.metadata.has_breadcrumb'))
<nav class="breadcrumbs">
    <div class="padding-global">
      <div class="container">
        <div class="breadcrumbs_inner">
          <div class="breadcrumbs_links">
            <a href="{{App::getLocale()}}" class="breadcrumbs_link is-dot">{{__('_home')}}</a>
            <div>{{data_get($page, 'data.seo_settings.meta_title')}}</div>
          </div>
          <div class="breadcrumbs_back-wrapper">
            <a href="{{url()->previous()}}" class="breadcrumbs_link w-inline-block">
              <div class="icon w-embed"><svg width="16" viewbox="0 0 16 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0416 5.2207C15.0416 5.49685 14.773 5.7207 14.4416 5.7207L1.24163 5.7207C0.910255 5.7207 0.641626 5.49684 0.641626 5.2207C0.641626 4.94456 0.910255 4.7207 1.24163 4.7207L14.4416 4.7207C14.773 4.7207 15.0416 4.94456 15.0416 5.2207Z"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.06589 10.0743C6.83158 10.2695 6.45168 10.2695 6.21736 10.0743L0.817361 5.57426C0.583046 5.37899 0.583046 5.06241 0.817361 4.86715L6.21736 0.367149C6.45168 0.171887 6.83158 0.171887 7.06589 0.367149C7.30021 0.562412 7.30021 0.878993 7.06589 1.07426L2.09015 5.2207L7.06589 9.36715C7.3002 9.56241 7.3002 9.87899 7.06589 10.0743Z"></path>
                </svg></div>
              <div>{{__('_back')}}</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
@if (data_get($page, 'data.layout') !== 'resource-detail')
    <section class="section_listing-hero">
        <div class="listing-hero_heading-block">
        <div class="padding-global">
            <div class="container">
            <h1 class="heading-style-h2">{{data_get($page, 'data.seo_settings.meta_title')}}</h1>
            </div>
        </div>
        </div>
    </section>
@endif

@endif

    @foreach((array)$page->data->blocks as $block)
        <x-dynamic-component :component="$block->type" :content="$block->data" :general="$page" />
    @endforeach

@endsection

