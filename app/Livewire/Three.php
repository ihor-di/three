<?php

namespace App\Livewire;

use App\Models\Node;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class Three extends Component
{
    public bool $hasChildren = false;

    public Node $node;

    public array $children;

    public bool $opened = false;

    public function mount(?Node $node): void
    {
        if (!$node->exists) {
            $this->node = Node::whereNull('parent_id')->first();
        } else {
            $this->node = $node;
        }

        $this->hasChildren = $this->node->children()->exists();
        $this->children = $this->node->children()->get()->all();
    }

    public function open(): void
    {
        $this->opened = !$this->opened;
    }

    public function plus(): void
    {
        $this->node->children()->create([
            'name' => Str::random(5),
        ]);

        $this->hasChildren = true;
        $this->children = $this->node->children()->get()->all();
        $this->dispatch('child-update');
    }

    public function minus(): void
    {
        $this->deleteAllDescendants($this->node);
        $this->node->delete();
        $this->dispatch('parent.$refresh');
    }

    public function deleteAllDescendants(Node $node): void
    {
        if ($node->children()->exists()) {
            foreach ($node->children()->get() as $child) {
                $this->deleteAllDescendants($child);
            }
            $node->children()->delete();
        }
    }

    public function render(): View
    {
        return view('livewire.three');
    }
}
