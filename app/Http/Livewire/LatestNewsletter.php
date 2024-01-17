<?php

namespace App\Http\Livewire;
use App\Models\Newsletter;

use Livewire\Component;

class LatestNewsletter extends Component
{
    public function render()
    {
        $dataNewsletters = Newsletter::latest()->take(4)->get();
        return view('livewire.latest-newsletter', [
            'dataNewsletters' => $dataNewsletters
        ]);    }
}