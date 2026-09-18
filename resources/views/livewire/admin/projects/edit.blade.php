<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-extrabold text-[#1A1A1A]" style="font-family: 'Space Grotesk', sans-serif;">
            Edit Project
        </h1>
        <a href="{{ route('admin.projects.index') }}"
            class="px-5 py-3 bg-white border-2 border-[#1A1A1A] text-[#1A1A1A] font-bold rounded-lg shadow-[4px_4px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200"
            style="font-family: 'Space Grotesk', sans-serif;">
            Back to List
        </a>
    </div>

    <div class="bg-white border-2 border-[#1A1A1A] rounded-lg shadow-[4px_4px_0px_0px_#1A1A1A] p-8 max-w-2xl mx-auto">
        <form wire:submit="save" class="space-y-8">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Project Title
                </label>
                <input type="text" id="title" wire:model="title"
                    class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                @error('title') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Category
                </label>
                <select id="category" wire:model="category"
                    class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] transition-colors duration-200 outline-none shadow-sm cursor-pointer font-bold">
                    <option value="real life project">Real-Life Project</option>
                    <option value="personal project">Personal Project</option>
                </select>
                @error('category') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Description
                </label>
                <textarea id="description" wire:model="description" rows="4"
                    class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none resize-none shadow-sm"></textarea>
                @error('description') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Project Image
                </label>
                <div
                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-[#1A1A1A] border-dashed rounded-md hover:bg-[#F5F3EF] transition-colors relative">
                    <div class="space-y-1 text-center">
                        @if ($newImage)
                            <div class="mx-auto h-32 w-48 relative border-2 border-[#1A1A1A] rounded overflow-hidden">
                                <img src="{{ $newImage->temporaryUrl() }}" class="h-full w-full object-cover" alt="Preview">
                                <button type="button" wire:click="$set('newImage', null)"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 border-2 border-[#1A1A1A]">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        @elseif ($project->image)
                            <div class="mx-auto h-32 w-48 relative border-2 border-[#1A1A1A] rounded overflow-hidden">
                                <img src="{{ image_url($project->image) }}" class="h-full w-full object-cover"
                                    alt="Current">
                                <div
                                    class="absolute bottom-0 inset-x-0 bg-[#1A1A1A] bg-opacity-80 text-white text-[10px] py-1 font-bold">
                                    CURRENT IMAGE</div>
                            </div>
                        @else
                            <svg class="mx-auto h-12 w-12 text-[#1A1A1A] opacity-30" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @endif

                        <div class="flex text-sm text-[#3D3D3D] justify-center mt-3">
                            <label for="image-upload"
                                class="relative cursor-pointer bg-white rounded-md font-bold text-[#FF6B55] hover:text-[#1A1A1A] focus-within:outline-none">
                                <span>{{ $project->image ? 'Change Image' : 'Upload a file' }}</span>
                                <input id="image-upload" wire:model="newImage" type="file" class="sr-only">
                            </label>
                        </div>
                    </div>
                </div>
                @error('newImage') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="demo_link" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Demo Link
                    </label>
                    <input type="url" id="demo_link" wire:model="demo_link"
                        class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                    @error('demo_link') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="github_link" class="block text-sm font-bold text-[#1A1A1A] mb-2 uppercase tracking-wide"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        GitHub Link
                    </label>
                    <input type="url" id="github_link" wire:model="github_link"
                        class="w-full px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-md focus:ring-0 focus:border-[#FF6B55] text-[#1A1A1A] placeholder-gray-400 transition-colors duration-200 outline-none shadow-sm">
                    @error('github_link') <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Featured Toggle -->
            <div class="flex items-center justify-between p-4 bg-[#F5F3EF] border-2 border-[#1A1A1A] rounded-md">
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-[#1A1A1A] uppercase tracking-wide"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Feature this project?
                    </label>
                    <span class="text-xs text-[#3D3D3D]">Featured projects get special highlighting.</span>
                </div>
                <button type="button" wire:click="$set('featured', {{ !$featured ? 'true' : 'false' }})"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-[#1A1A1A] transition-colors duration-200 ease-in-out focus:outline-none {{ $featured ? 'bg-[#FF6B55]' : 'bg-gray-200' }}">
                    <span
                        class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out border-2 border-[#1A1A1A] {{ $featured ? 'translate-x-5' : 'translate-x-0' }}"></span>
                </button>
            </div>

            <!-- Actions -->
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-8 py-4 bg-[#FF6B55] border-2 border-[#1A1A1A] text-white font-bold rounded-lg shadow-[4px_4px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px] hover:bg-[#1A1A1A] transition-all duration-200"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>