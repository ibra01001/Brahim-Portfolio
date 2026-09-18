<?php

namespace App\Livewire\Admin\Career\Certification;

use App\Models\Certification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.layout.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public Certification $certification;

    #[Validate('required|min:2')]
    public $name = '';

    #[Validate('nullable|min:2')]
    public $issuer = '';

    #[Validate('nullable|integer|min:1900|max:2100')]
    public $year;

    #[Validate('nullable|url')]
    public $url = '';

    #[Validate('nullable|file|mimes:pdf|max:5120')]
    public $pdf;

    #[Validate('boolean')]
    public $is_active = true;

    #[Validate('required|integer')]
    public $order = 0;

    public function mount(Certification $certification)
    {
        $this->certification = $certification;
        $this->name = $certification->name;
        $this->issuer = $certification->issuer;
        $this->year = $certification->year;
        $this->url = $certification->url;
        $this->pdf = $certification->pdf_path;
        $this->is_active = $certification->is_active;
        $this->order = $certification->order;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'issuer' => $this->issuer,
            'year' => $this->year,
            'url' => $this->url,
            'is_active' => $this->is_active,
            'order' => $this->order,
        ];

        if ($this->pdf) {
            if ($this->certification->pdf_path) {
                \App\Services\ImageStorageService::delete($this->certification->pdf_path);
            }
            $data['pdf_path'] = \App\Services\ImageStorageService::upload($this->pdf, 'certifications');
        }

        $this->certification->update($data);

        session()->flash('message', 'Certification updated successfully.');
        return redirect()->route('admin.career.certification.index');
    }

    public function render()
    {
        return view('livewire.admin.career.certification.edit');
    }
}
