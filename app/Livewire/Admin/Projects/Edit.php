<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.layout.admin')]
class Edit extends Component
{
    use WithFileUploads;
    #[Validate('required|in:real life project, personal project')]
    public $category = 'real life project';
    public Project $project;

    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('nullable|image|max:3072')]
    public $newImage;

    #[Validate('nullable|url')]
    public $demo_link = '';

    #[Validate('nullable|url')]
    public $github_link = '';

    #[Validate('boolean')]
    public $featured = false;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->category = $project->category;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->demo_link = $project->demo_link;

        $this->github_link = $project->github_link;
        $this->featured = (bool) $project->featured;
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->project->image;

        if ($this->newImage) {
            if ($this->project->image) {
                \App\Services\ImageStorageService::delete($this->project->image);
            }
            $imagePath = \App\Services\ImageStorageService::upload($this->newImage, 'projects');
        }

        $this->project->update([
            'title' => $this->title,
            'category' => $this->category,
            'description' => $this->description,
            'image' => $imagePath,
            'demo_link' => $this->demo_link,
            'github_link' => $this->github_link,
            'featured' => $this->featured,
        ]);

        return redirect()->route('admin.projects.index')->with('message', 'Project updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.projects.edit');
    }
}
