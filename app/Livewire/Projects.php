<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Projects extends Component
{
    public function render()
    {
        $groupedProjects = Project::latest()
            ->get()
            ->groupBy('category');

        return view('livewire.projects', [
            'groupedProjects' => $groupedProjects,
        ]);
    }
}
