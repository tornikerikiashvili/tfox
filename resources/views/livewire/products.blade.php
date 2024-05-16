	@push('headStyles')
       <style>
        .product_parent_category .filter-button-flip {
            font-size: 21px;
        }

        .page_cover {
            height: 200px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .page_cover img {
            height: 200px;
        }

        .title-fill:after, .title-fill.title-fill-anim:before, .title-fill.title-fill-anim:after {
            background-color: transparent;
        }

        .overlay {
          width: 100%;
          height: 100%;
          background-color: black;
          position: absolute;
          opacity: 0.3;
          z-index: 1;
        }

        .page_cover_title {
            z-index: 2;
        }

        .page_cover_title .title-fill:after {
            color:white;
        }

        .filter_cat_divider {
            width: 10px;
            height: 10px;
            background-color: #f05523;
            border-radius: 50%;
            display: inline-block;
            margin-bottom: 3px;
        }
       </style>
    @endpush
<div>
    <div class="page_cover" style="background-image: url({{'/storage/' . data_get($content, 'page_cover')}})">
        <div wire:ignore class="page_cover_title text-center">
            <h2 class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="{{data_get(Arr::first($currentCategory), 'title')}}">{{data_get(Arr::first($currentCategory), 'title')}}</h2><br>
        </div>
        <div class="overlay"></div>
    </div>

    <!-- dark-bg-2 start -->
    <section id="down" class="dark-bg-2 top-bottom-padding-120">
        <!-- container start -->
        <div class="container">


            <!-- filter-buttons start -->
            @if(empty($childCategories))
                <div class="filter-buttons">
                        <button wire:click="setCatCat({{'null'}})" class="filter-button-box pointer-small {{$filter == null ? 'active' : ''}}" data-filter="*">
                            <span class="filter-button-flip" data-text="{{__('_all')}}">{{__('_all')}}</span>
                        </button>
                    @foreach ($categories as $category)
                        <button wire:click="setCatCat({{data_get($category, 'id')}})" class="filter-button-box pointer-small {{$filter == data_get($category, 'id') ? 'active' : ''}}" data-filter=".{{data_get($category, 'id')}}">
                            <span class="filter-button-flip" data-text="{{data_get($category, 'title')}}">{{data_get($category, 'title')}}</span>
                        </button>
                        @if (!$loop->last)
                        <div class="filter_cat_divider"></div>
                      @endif
                    @endforeach
                </div>
            @endif

            @if(!empty($childCategories))
                    <div wire:ignore class="filter-buttons product_parent_category">

                        @foreach ($categories as $category)
                            <a href="{{App::getLocale() . '/products?category=' . request()->query('category') . '&children=' . data_get($category, 'id')}}" class=" {{$children == data_get($category, 'id') ? 'active' : ''}} animsition-link pointer-large filter-button-box pointer-small">
                                <span class="filter-button-flip" data-text="{{data_get($category, 'title')}}">{{data_get($category, 'title')}}</span>
                            </a>
                        @endforeach
                    </div>

                <div class="filter-buttons">
                    <button class="filter-button-box pointer-small active" data-filter="*">
                        <span class="filter-button-flip" data-text="{{__('_all')}}">{{__('_all')}}</span>
                    </button>
                    @foreach ($childCategories as $category)
                        <button class="filter-button-box pointer-small" data-filter=".{{data_get($category, 'id')}}">
                            <span class="filter-button-flip" data-text="{{data_get($category, 'title')}}">{{data_get($category, 'title')}}</span>
                        </button>
                        @if (!$loop->last)
                          <div class="filter_cat_divider"></div>
                        @endif

                    @endforeach
                 </div>
            @endif
            <!-- filter-buttons end -->

            <!-- works start -->
            <div wire:ignore class="works">
                @foreach ($products as $product)
                    <a href="{{App::getLocale() . '/product/' . data_get($product, 'id')}}" class="animsition-link grid-item {{data_get($product, 'category_id')}}">
                        <div class="work_item pointer-large hover-box hidden-box">
                            <img class="hover-img" src="{{data_get($product, 'cover_image.url')}}" alt="">
                            <div class="works-content">
                                {{-- <span class="small-title-oswald red-color work-title-overlay">{{"Brand Name"}}</span> --}}
                                <h3 class="title-style text-color-4">
                                    <span class="work-title-overlay work-title-delay01">{{data_get($product, 'title.one')}}</span><br>
                                    <span class="work-title-overlay work-title-delay02">{{data_get($product, 'title.two')}}</span><br>
                                    <span class="work-title-overlay work-title-delay03">{{data_get($product, 'title.three')}}</span>
                                </h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div><!-- works end -->
        </div><!-- container end -->
    </section><!-- dark-bg-2 end -->
</div>

@push('bodyScripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const currentCat = {{ Illuminate\Support\Js::from($filter) }};

            // Find the button with data-filter
            const filterButton = document.querySelector('button[data-filter=".' + currentCat + '"]');

            // Trigger click event if button found
            if (filterButton) {
                setTimeout(function() {
                filterButton.click();
             }, 100);

            }
        });
    </script>
@endpush
