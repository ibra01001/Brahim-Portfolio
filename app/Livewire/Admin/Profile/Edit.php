<?php

namespace App\Livewire\Admin\Profile;

use App\Models\Profile;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.layout.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public Profile $profile;

    #[Validate('nullable|image|max:2048')] // 2MB Max
    public $newImage;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('nullable|min:10')]
    public $bio = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('nullable|url')]
    public $github = '';

    #[Validate('nullable|url')]
    public $linkedin = '';

    #[Validate('nullable|url')]
    public $twitter = '';

    public function mount()
    {
        $this->profile = Profile::firstOrNew();
        $this->name = $this->profile->name;
        $this->title = $this->profile->title;
        $this->bio = $this->profile->bio;
        $this->email = $this->profile->email;
        $this->github = $this->profile->github;
        $this->linkedin = $this->profile->linkedin;
        $this->twitter = $this->profile->twitter;
    }

    public function save()
    {
        $this->validate();

        if ($this->newImage) {
            if ($this->profile->image) {
                Storage::delete($this->profile->image);
            }
            $imagePath = $this->newImage->store('profile', 'public');
        }

        $this->profile->fill([
            'name' => $this->name,
            'image' => $imagePath ?? $this->profile->image,
            'title' => $this->title,
            'bio' => $this->bio ?? '',
            'email' => $this->email,
            'github' => $this->github,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter,
        ])->save();

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.profile.edit');
    }
}
