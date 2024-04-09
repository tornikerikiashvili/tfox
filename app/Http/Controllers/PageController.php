<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Palindroma\Core\Models\Page;
use Palindroma\Core\Models\Redirect;
use Illuminate\Support\Facades\Cache;
use App\Settings\CommunicationsSettings;
use Palindroma\Core\Settings\GeneralSettings;
use Palindroma\Core\Http\Resources\PageResource;
use Palindroma\Core\Http\Resources\RedirectResource;
use Palindroma\Core\Http\Resources\NavigationResource;
use RyanChandler\FilamentNavigation\Models\Navigation;

class PageController extends Controller
{
    public function __invoke(Request $request, string $locale, string $slug = 'home')
    {
        $this->validate($request, [
            'include_translations' => 'boolean',
            'include_navigations' => 'boolean',
            'include_settings' => 'boolean',
            'include_communications' => 'boolean',
            'blocks' => 'array',
            'blocks.*' => 'array',
        ]);

        $additional = [];


        $additional['navigations'] = NavigationResource::collection(Navigation::all());



        $additional['translations'] = __("*");


        $additional['settings'] = app(GeneralSettings::class)->toArrayForFrontend();

        $additional['communications'] = app(CommunicationsSettings::class)->toArrayForFrontend();



        if ($request->boolean('include_redirects')) {
            $additional['redirects'] = RedirectResource::collection(Redirect::all());
        }

        $slug = '{' . $slug . '}';

        $request->merge([
            'slug' => $slug,
            'locale' => app()->getLocale(),
        ]);

        /**
         * @var Page $page
         */
        $page = Page::findBySlug($slug);

        $pageHash = sha1($page->id . "|" . json_encode($request->input()));
        $cache = Cache::supportsTags() ? Cache::tags(['pages']) : Cache::driver();

        $page = $cache->remember("pages.$pageHash", now()->addDay(), function () use ($additional, $page) {
            return PageResource::make($page)->additional($additional)->response()->getData();
        });

        return view('page', ['page' => $page]);
    }
}
