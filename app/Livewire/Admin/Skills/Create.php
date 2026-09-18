<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

use Livewire\WithFileUploads;

#[Layout('livewire.layout.admin')]
class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|min:2')]
    public $name = '';

    #[Validate('boolean')]
    public $show_level = true;

    public $level = 'Intermediate';

    #[Validate('required|in:language,framework,library,tool,other,database')]
    public $category = 'language';

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $image;

    #[Validate('nullable|string')]
    public $description = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2',
            'level' => $this->show_level ? 'required|in:Beginner,Intermediate,Advanced,Expert' : 'nullable',
            'category' => 'required|in:language,framework,library,tool,other,database',
            'image' => 'nullable|image|max:1024',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = \App\Services\ImageStorageService::upload($this->image, 'skills');
        }

        Skill::create([
            'name' => $this->name,
            'level' => $this->show_level ? $this->level : null,
            'category' => $this->category,
            'image' => $imagePath,
            'description' => $this->description,
            'show_level' => $this->show_level,
        ]);

        session()->flash('message', 'Skill created successfully.');
        return redirect()->route('admin.skills.index');
    }

    public function render()
    {
        return view('livewire.admin.skills.create');
    }
}
