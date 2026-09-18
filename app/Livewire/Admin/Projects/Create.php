<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('livewire.layout.admin')]
class Create extends Component
{
    use WithFileUploads;
    #[Validate('required|in:real life project, personal project')]
    public $category = 'real life project';

    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('nullable|image|max:3072')]
    public $image;

    #[Validate('nullable|url')]
    public $demo_link = '';

    #[Validate('nullable|url')]
    public $github_link = '';

    #[Validate('boolean')]
    public $featured = false;

    public function save()
    {
        $this->validate();

        $imagePath = $this->image ? \App\Services\ImageStorageService::upload($this->image, 'projects') : null;

        Project::create([
            'title' => $this->title,
            'category' => $this->category,
            'description' => $this->description,
            'image' => $imagePath,
            'demo_link' => $this->demo_link,
            'github_link' => $this->github_link,
            'featured' => $this->featured,
        ]);

        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.projects.create');
    }
}
