<?php

namespace App\Livewire\Admin\Career\Experience;

use App\Models\Experience;
use App\Models\Profile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('livewire.layout.admin')]
class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|min:2')]
    public $role = '';

    #[Validate('required|min:2')]
    public $company = '';

    #[Validate('nullable|image|max:1024')]
    public $company_logo;

    #[Validate('nullable|string')]
    public $location = '';

    #[Validate('required|date')]
    public $start_date;

    #[Validate('nullable|date|after_or_equal:start_date')]
    public $end_date;

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('boolean')]
    public $is_active = true;

    #[Validate('required|integer')]
    public $order = 0;

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->company_logo) {
            $imagePath = \App\Services\ImageStorageService::upload($this->company_logo, 'experiences');
        }

        // Assuming there is only one profile for now, or get the first one
        $profile = Profile::first();

        Experience::create([
            'profile_id' => $profile->id,
            'role' => $this->role,
            'company' => $this->company,
            'company_logo' => $imagePath,
            'location' => $this->location,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'order' => $this->order,
        ]);

        session()->flash('message', 'Experience created successfully.');
        return redirect()->route('admin.career.experience.index');
    }

    public function render()
    {
        return view('livewire.admin.career.experience.create');
    }
}
