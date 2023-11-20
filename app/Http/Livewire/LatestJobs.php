<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Offering;

class LatestJobs extends Component
{
    public function render()
    {
        $jobs = Offering::latest()->take(2)->get();
        return view('livewire.latest-jobs', [
            'jobs' => $jobs
        ]);
    }
}