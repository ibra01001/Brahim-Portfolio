<?php

namespace App\Livewire\Admin\Career\Certification;

use App\Models\Certification;
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
    public $name = '';

    #[Validate('nullable|min:2')]
    public $issuer = '';

    #[Validate('nullable|integer|min:1900|max:2100')]
    public $year;

    #[Validate('nullable|url')]
    public $url = '';

    #[Validate('required|file|mimes:pdf|max:5120')] // 5MB Max
    public $pdf;


    #[Validate('boolean')]
    public $is_active = true;

    #[Validate('required|integer')]
    public $order = 0;

    public function save()
    {
        $this->validate();

        $pdfPath = null;
        if ($this->pdf) {
            $pdfPath = \App\Services\ImageStorageService::upload($this->pdf, 'certifications');
        }

        $profile = Profile::first();

        Certification::create([
            'profile_id' => $profile->id,
            'name' => $this->name,
            'issuer' => $this->issuer,
            'year' => $this->year,
            'url' => $this->url,
            'pdf_path' => $pdfPath,
            'is_active' => $this->is_active,
            'order' => $this->order,
        ]);

        session()->flash('message', 'Certification created successfully.');
        return redirect()->route('admin.career.certification.index');
    }

    public function render()
    {
        return view('livewire.admin.career.certification.create');
    }
}
