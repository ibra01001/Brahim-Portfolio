<?php

namespace App\Livewire\Admin\Career\Experience;

use App\Models\Experience;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.layout.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public Experience $experience;

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

    public function mount(Experience $experience)
    {
        $this->experience = $experience;
        $this->role = $experience->role;
        $this->company = $experience->company;
        $this->location = $experience->location;
        $this->start_date = $experience->start_date?->format('Y-m-d');
        $this->end_date = $experience->end_date?->format('Y-m-d');
        $this->description = $experience->description;
        $this->is_active = $experience->is_active;
        $this->order = $experience->order;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'role' => $this->role,
            'company' => $this->company,
            'location' => $this->location,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'order' => $this->order,
        ];

        if ($this->company_logo) {
            if ($this->experience->company_logo) {
                \App\Services\ImageStorageService::delete($this->experience->company_logo);
            }
            $data['company_logo'] = \App\Services\ImageStorageService::upload($this->company_logo, 'experiences');
        }

        $this->experience->update($data);

        session()->flash('message', 'Experience updated successfully.');
        return redirect()->route('admin.career.experience.index');
    }

    public function render()
    {
        return view('livewire.admin.career.experience.edit');
    }
}
