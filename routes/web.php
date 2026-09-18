<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Projects;
use App\Livewire\Contact;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Projects\Index as AdminProjectsIndex;
use App\Livewire\Admin\Projects\Create as AdminProjectsCreate;
use App\Livewire\Admin\Projects\Edit as AdminProjectsEdit;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    // Projects
    Route::get('/projects', AdminProjectsIndex::class)->name('projects.index');
    Route::get('/projects/create', AdminProjectsCreate::class)->name('projects.create');
    Route::get('/projects/{project}/edit', AdminProjectsEdit::class)->name('projects.edit');

    // Skills
    Route::get('/skills', \App\Livewire\Admin\Skills\Index::class)->name('skills.index');
    Route::get('/skills/create', \App\Livewire\Admin\Skills\Create::class)->name('skills.create');
    Route::get('/skills/{skill}/edit', \App\Livewire\Admin\Skills\Edit::class)->name('skills.edit');

    // Profile
    Route::get('/profile', \App\Livewire\Admin\Profile\Edit::class)->name('profile.edit');

    // Career
    Route::get('/career', \App\Livewire\Admin\Career\Index::class)->name('career.index');

    // Experience
    Route::get('/career/experience', \App\Livewire\Admin\Career\Experience\Index::class)->name('career.experience.index');
    Route::get('/career/experience/create', \App\Livewire\Admin\Career\Experience\Create::class)->name('career.experience.create');
    Route::get('/career/experience/{experience}/edit', \App\Livewire\Admin\Career\Experience\Edit::class)->name('career.experience.edit');

    // Education
    Route::get('/career/education', \App\Livewire\Admin\Career\Education\Index::class)->name('career.education.index');
    Route::get('/career/education/create', \App\Livewire\Admin\Career\Education\Create::class)->name('career.education.create');
    Route::get('/career/education/{education}/edit', \App\Livewire\Admin\Career\Education\Edit::class)->name('career.education.edit');

    // Certification
    Route::get('/career/certification', \App\Livewire\Admin\Career\Certification\Index::class)->name('career.certification.index');
    Route::get('/career/certification/create', \App\Livewire\Admin\Career\Certification\Create::class)->name('career.certification.create');
    Route::get('/career/certification/{certification}/edit', \App\Livewire\Admin\Career\Certification\Edit::class)->name('career.certification.edit');

    // Language
    Route::get('/career/language', \App\Livewire\Admin\Career\Language\Index::class)->name('career.language.index');
    Route::get('/career/language/create', \App\Livewire\Admin\Career\Language\Create::class)->name('career.language.create');
    Route::get('/career/language/{language}/edit', \App\Livewire\Admin\Career\Language\Edit::class)->name('career.language.edit');

    // Messages
    Route::get('/messages', \App\Livewire\Admin\Messages\Index::class)->name('messages.index');
});

Route::get('/career', \App\Livewire\Career::class)->name('career');


/*
|--------------------------------------------------------------------------
| Public Portfolio Routes
|--------------------------------------------------------------------------
*/


Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/projects', Projects::class)->name('projects');
Route::get('/contact', Contact::class)->name('contact');
require __DIR__ . '/auth.php';
