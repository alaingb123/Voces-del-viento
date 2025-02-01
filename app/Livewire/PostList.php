<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostList extends Component
{

    use WithPagination;

    #[Url()]
    public $sort = "desc";

    #[Url()]
    public $search = '';

    public function setSort($sort){
         $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
         $this->resetPage();
    }

    #[On('search')]
    public function updatingSearch($search){
        $this->search = $search;

    }

    #[Computed()]
    public function posts(){
        return Post::published()
        ->orderBy('published_at', $this->sort)
        ->where('title', 'like', '%'.$this->search.'%')
        ->Paginate(5);
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
