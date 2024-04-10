<?php

namespace App\Http\Livewire;

use Livewire\Component;

abstract class AbstractComponent extends Component
{
    public $locale = '';

    public $slug = '';

    public function getQueryString()
    {
        $query = parent::getQueryString();

        $query['slug'] = [
            'except' => request('slug', $this->slug),
        ];

        $query['locale'] = [
            'except' => request('locale', $this->locale),
        ];

        return $query;
    }
}
