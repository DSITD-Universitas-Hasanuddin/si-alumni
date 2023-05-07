<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class IndexPost extends Component
{
    public $perPage = 4;
    protected $listeners = [
      'increasePerPage'
    ];
    public function increasePerPage($count)
    {
        $this->perPage += $count;
    }
    public function loadMore($counts)
    {
        $this->emit('increasePerPage', $counts);
    }
    public function render()
    {
        $listPosts = Post::all();
        $postsCount = $listPosts->count();

        return view('livewire.index-post',[
            'dataPosts' => $listPosts
                ->sortByDesc('created_at')
                ->paginate($this->perPage),
            'postsCount' => $postsCount
        ]);
    }
}
