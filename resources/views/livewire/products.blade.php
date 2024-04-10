	@push('headStyles')
       <style>
        .product_parent_category .filter-button-flip {
            font-size: 21px;
        }
       </style>
    @endpush

    <!-- dark-bg-2 start -->
    <section id="down" class="dark-bg-2 top-bottom-padding-120">
        <!-- container start -->
        <div class="container">
            <div class="text-center">
                <h2 class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="Recent Works">Recent Works</h2><br>
            </div>

            <!-- filter-buttons start -->
            @if(empty($childCategories))
                <div class="filter-buttons top-padding-90">
                        <button class="filter-button-box pointer-small active" data-filter="*">
                            <span class="filter-button-flip" data-text="{{__('_all')}}">{{__('_all')}}</span>
                        </button>
                    @foreach ($categories as $category)
                        <button class="filter-button-box pointer-small" data-filter=".{{data_get($category, 'id')}}">
                            <span class="filter-button-flip" data-text="{{data_get($category, 'title')}}">{{data_get($category, 'title')}}</span>
                        </button>
                    @endforeach
                </div>
            @endif

            @if(!empty($childCategories))
                    <div wire:ignore class="filter-buttons top-padding-90 product_parent_category">
                        @foreach ($categories as $category)
                            <button wire:click="setChildren({{data_get($category, 'id')}})" class=" {{$children == data_get($category, 'id') ? 'active' : ''}} filter-button-box pointer-small">
                                <span class="filter-button-flip" data-text="{{data_get($category, 'title')}}">{{data_get($category, 'title')}}</span>
                            </button>
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
                    @endforeach
                 </div>
            @endif
            <!-- filter-buttons end -->

            <!-- works start -->
            <div class="works">
                @foreach ($products as $product)
                    <a href="project.html" class="animsition-link grid-item {{data_get($product, 'category_id')}}">
                        <div class="work_item pointer-large hover-box hidden-box">
                            <img class="hover-img" src="{{data_get($product, 'cover_image.url')}}" alt="">
                            <div class="works-content">
                                <span class="small-title-oswald red-color work-title-overlay">{{data_get($product, 'category_id')}}</span>
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
