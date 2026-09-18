<div>
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#1A1A1A] mb-2" style="font-family: 'Space Grotesk', sans-serif;">
            Edit Profile
        </h1>
        <p class="text-[#3D3D3D] font-medium">Update your public profile information.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-[#F5F3EF] border-2 border-[#1A1A1A] rounded-lg shadow-sm flex items-center">
            <div class="flex-shrink-0 w-8 h-8 bg-green-500 border-2 border-[#1A1A1A] rounded-full flex items-center justify-center text-white mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <span class="font-bold text-[#1A1A1A]">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-white border-2 border-[#1A1A1A] rounded-lg shadow-[4px_4px_0px_0px_#1A1A1A] p-8">
        <form wire:submit="save" class="space-y-8">
            <!-- Grid for Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                        Full Name
                    </label>
                    <input type="text" id="name" wire:model="name"
                        class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                    @error('name') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                        Profile Image
                    </label>

                    <div class="mt-2 flex items-center space-x-6">
                        <div class="shrink-0 relative">
                            <div class="h-20 w-20 rounded-full border-2 border-[#1A1A1A] overflow-hidden bg-[#F5F3EF]">
                                @if ($newImage)
                                    <img class="h-full w-full object-cover" src="{{ $newImage->temporaryUrl() }}" alt="New profile photo">
                                @elseif ($profile->image)
                                    <img class="h-full w-full object-cover" src="{{ image_url($profile->image) }}" alt="Current profile photo">
                                @else
                                    <div class="h-full w-full flex items-center justify-center text-[#1A1A1A]">
                                        <svg class="h-10 w-10 opacity-30" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <!-- Decorative accent -->
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#FF6B55] border-2 border-[#1A1A1A] rounded-full"></div>
                        </div>
                        
                        <div class="flex-1">
                            <label class="block w-full">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" wire:model="newImage" id="image" 
                                    class="block w-full text-sm text-[#3D3D3D]
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-2 file:border-[#1A1A1A]
                                    file:text-sm file:font-bold
                                    file:bg-white file:text-[#1A1A1A]
                                    hover:file:bg-[#1A1A1A] hover:file:text-white
                                    file:transition-colors file:cursor-pointer
                                " />
                            </label>
                            <p class="text-xs text-[#3D3D3D] mt-2">Recommended: Square JPG or PNG, max 1MB.</p>
                        </div>
                    </div>
                    @error('newImage') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                    Job Title
                </label>
                <input type="text" id="title" wire:model="title"
                    class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                @error('title') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                    Contact Email
                </label>
                <input type="email" id="email" wire:model="email"
                    class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                @error('email') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Bio -->
            <div>
                <label for="bio" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                    Biography
                </label>
                <textarea id="bio" wire:model="bio" rows="4"
                    class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none resize-none shadow-sm"></textarea>
                @error('bio') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="pt-6 border-t-2 border-[#1A1A1A] border-dashed">
                <h3 class="text-xl font-bold text-[#1A1A1A] mb-6" style="font-family: 'Space Grotesk', sans-serif;">Social Links</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- GitHub -->
                    <div>
                        <label for="github" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                            GitHub URL
                        </label>
                        <input type="url" id="github" wire:model="github"
                            class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                        @error('github') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <label for="linkedin" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                            LinkedIn URL
                        </label>
                        <input type="url" id="linkedin" wire:model="linkedin"
                            class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                        @error('linkedin') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Twitter -->
                    <div>
                        <label for="twitter" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide" style="font-family: 'Space Grotesk', sans-serif;">
                            Twitter URL
                        </label>
                        <input type="url" id="twitter" wire:model="twitter"
                            class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                        @error('twitter') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-[#FF6B55] border-2 border-[#1A1A1A] text-white font-bold rounded-lg shadow-[4px_4px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px] hover:bg-[#1A1A1A] transition-all duration-200"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>