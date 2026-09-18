<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Layout('livewire.layout.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public Skill $skill;

    #[Validate('required|min:2')]
    public $name = '';

    #[Validate('boolean')]
    public $show_level;

    public $level;

    #[Validate('required|in:language,framework,library,tool,other,database')]
    public $category;

    #[Validate('nullable|image|max:1024')]
    public $newImage;

    #[Validate('nullable|string')]
    public $description = '';

    public function mount(Skill $skill)
    {
        $this->skill = $skill;
        $this->name = $skill->name;
        $this->level = $skill->level ?? 'Intermediate';
        $this->category = $skill->category;
        $this->description = $skill->description;
        $this->show_level = $skill->show_level;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2',
            'level' => $this->show_level ? 'required|in:Beginner,Intermediate,Advanced,Expert' : 'nullable',
            'category' => 'required|in:language,framework,library,tool,other,database',
            'newImage' => 'nullable|image|max:1024',
            'description' => 'nullable|string',
        ]);

        $imagePath = $this->skill->image;
        if ($this->newImage) {
            if ($this->skill->image) {
                \App\Services\ImageStorageService::delete($this->skill->image);
            }
            $imagePath = \App\Services\ImageStorageService::upload($this->newImage, 'skills');
        }

        $this->skill->update([
            'name' => $this->name,
            'image' => $imagePath,
            'description' => $this->description,
            'level' => $this->show_level ? $this->level : null,
            'category' => $this->category,
            'show_level' => $this->show_level,
        ]);

        session()->flash('message', 'Skill updated successfully.');
        return redirect()->route('admin.skills.index');
    }

    public function render()
    {
        return view('livewire.admin.skills.edit');
    }
}
