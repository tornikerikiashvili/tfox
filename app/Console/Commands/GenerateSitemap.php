<?php
namespace App\Console\Commands;
use App\Models\Post;
use Spatie\Sitemap\Sitemap;
use App\Models\Content\News;
use Spatie\Sitemap\Tags\Url;
use App\Models\Content\Project;
use Illuminate\Console\Command;
use Palindroma\Core\Models\Tag;
use Palindroma\Core\Models\Page;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\App;
use App\Models\BuildingDevelopment\Apartment;
use Palindroma\Core\Http\Resources\ContentResource;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';
    /**
     * Execute the console command.
     *
     * @return int
     */


    public function handle()
    {
        // Create a new sitemap to merge both page and apartment sitemaps
        $mergedSitemap = Sitemap::create();

        // Process pages for English language
        $pagesitmapEN = Sitemap::create();
        Page::get()->each(function (Page $page) use ($pagesitmapEN, $mergedSitemap) {
            $pagesitmapEN->add(
                Url::create("/en/{$page->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );

            // Add English page URL to the merged sitemap
            $mergedSitemap->add(
                Url::create("/en/{$page->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );

            // Process pages for Georgian language
            $pagesitmapKA = Sitemap::create();
            Page::get()->each(function (Page $page) use ($pagesitmapKA, $mergedSitemap) {
                $pagesitmapKA->add(
                    Url::create("/ka/{$page->slug}")
                        ->setPriority(0.9)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );

                // Add Georgian page URL to the merged sitemap
                $mergedSitemap->add(
                    Url::create("/ka/{$page->slug}")
                        ->setPriority(0.9)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
            });
        });

        // Process apartments for English language

           $apsitmapEN = Sitemap::create();
           Product::all()->each(function (Product $product) use ($apsitmapEN, $mergedSitemap) {
            $apsitmapEN->add(
                Url::create("/en/product/{$product->metadata->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );

            // Add English apartment URL to the merged sitemap
            $mergedSitemap->add(
                Url::create("/en/product/{$product->metadata->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );



            // Process apartments for Georgian language
            $apsitmapKA = Sitemap::create();
            Product::all()->each(function (Product $product) use ($apsitmapKA, $mergedSitemap) {
                $apsitmapKA->add(
                    Url::create("/ka/product/{$product->metadata->slug}")
                        ->setPriority(0.9)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );

                // Add Georgian apartment URL to the merged sitemap
                $mergedSitemap->add(
                    Url::create("/ka/product/{$product->metadata->slug}")
                        ->setPriority(0.9)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
            });
        });

        // Process news for English language

        $apsitmapEN = Sitemap::create();
        News::all()->each(function (News $news) use ($apsitmapEN, $mergedSitemap) {
         $apsitmapEN->add(
             Url::create("/en/article/{$news->metadata->slug}")
                 ->setPriority(0.9)
                 ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
         );

         // Add English news URL to the merged sitemap
         $mergedSitemap->add(
             Url::create("/en/article/{$news->metadata->slug}")
                 ->setPriority(0.9)
                 ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
         );



         // Process news for Georgian language
         $apsitmapKA = Sitemap::create();
         News::all()->each(function (News $news) use ($apsitmapKA, $mergedSitemap) {
             $apsitmapKA->add(
                 Url::create("/ka/article/{$news->metadata->slug}")
                     ->setPriority(0.9)
                     ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
             );

             // Add Georgian news URL to the merged sitemap
             $mergedSitemap->add(
                 Url::create("/ka/article/{$news->metadata->slug}")
                     ->setPriority(0.9)
                     ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
             );
         });
     });





        // Process projects for English language

        $apsitmapEN = Sitemap::create();
        Project::all()->each(function (Project $product) use ($apsitmapEN, $mergedSitemap) {
         $apsitmapEN->add(
             Url::create("/en/project/{$product->metadata->slug}")
                 ->setPriority(0.9)
                 ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
         );

         // Add English projects URL to the merged sitemap
         $mergedSitemap->add(
             Url::create("/en/project/{$product->metadata->slug}")
                 ->setPriority(0.9)
                 ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
         );



         // Process projects for Georgian language
         $apsitmapKA = Sitemap::create();
         Project::all()->each(function (Project $product) use ($apsitmapKA, $mergedSitemap) {
             $apsitmapKA->add(
                 Url::create("/ka/project/{$product->metadata->slug}")
                     ->setPriority(0.9)
                     ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
             );

             // Add Georgian projects URL to the merged sitemap
             $mergedSitemap->add(
                 Url::create("/ka/project/{$product->metadata->slug}")
                     ->setPriority(0.9)
                     ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
             );
         });
     });

        // Write merged sitemap to file
        $mergedSitemap->writeToFile(public_path('sitemap.xml'));
    }
}

