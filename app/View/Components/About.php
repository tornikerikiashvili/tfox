<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Content\Partner;
use App\Models\Content\TeamMember;
use Palindroma\Core\Http\Resources\ContentResource;

class About extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $team;
    public $partners = [];

    public function __construct(public $content)
    {
        $teamIds = data_get($content, 'team');
        $clientIds = data_get($content, 'clients', []);
        $this->team = ContentResource::collection(TeamMember::whereIn('id', $teamIds)->get())->response()->getData()->data;
        $this->partners = ContentResource::collection(Partner::whereIn('id', $clientIds)->get())->response()->getData()->data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about');
    }
}
