
    <div class="overlay-content">
        <form >
          <input wire:ignore wire:model="keyword" type="text" placeholder="{{__('_search')}}" name="search">
        </form>
        <div class="search_results">
          <ul>
            @foreach ($filteredProducts as $item)
               <li class="result_box">
                    <a href="{{App::getLocale() . '/product/' . data_get($item, 'metadata.slug') }}">
                        <div class="result_box_img">
                            <img loading="lazy" src="{{data_get($item, 'cover_image.url')}}">
                        </div>
                        <div class="result_title">
                            <span>{{data_get($item, 'name')}}</span>
                        </div>
                    </a>
               </li>
            @endforeach


          </ul>
        </div>

