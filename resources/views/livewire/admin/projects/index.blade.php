<div>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold text-[#1A1A1A]" style="font-family: 'Space Grotesk', sans-serif;">
            Projects
        </h1>

        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <select wire:model.live="categoryFilter"
                class="px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-lg text-[#1A1A1A] font-bold shadow-[4px_4px_0px_0px_#1A1A1A] focus:outline-none focus:ring-0 focus:border-[#FF6B55] transition-all cursor-pointer">
                <option value="">All Categories</option>
                <option value="real life project">Real-Life Projects</option>
                <option value="personal project">Personal Projects</option>
            </select>

            <a href="{{ route('admin.projects.create') }}"
                class="px-5 py-3 bg-[#FF6B55] text-white font-bold rounded-lg border-2 border-[#1A1A1A] shadow-[4px_4px_0px_0px_#1A1A1A] hover:bg-[#1A1A1A] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 flex items-center justify-center"
                style="font-family: 'Space Grotesk', sans-serif;">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Add Project
            </a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-[#F5F3EF] border-2 border-[#1A1A1A] rounded-lg shadow-sm flex items-center">
            <div
                class="flex-shrink-0 w-8 h-8 bg-green-500 border-2 border-[#1A1A1A] rounded-full flex items-center justify-center text-white mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <span class="font-bold text-[#1A1A1A]">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-white border-2 border-[#1A1A1A] rounded-lg overflow-hidden shadow-[4px_4px_0px_0px_#1A1A1A]">
        <table class="min-w-full divide-y-2 divide-[#1A1A1A]">
            <thead class="bg-[#F5F3EF]">
                <tr>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-black text-[#1A1A1A] uppercase tracking-wider border-r-2 border-[#1A1A1A]"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Project Details</th>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-black text-[#1A1A1A] uppercase tracking-wider border-r-2 border-[#1A1A1A]"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Category</th>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-black text-[#1A1A1A] uppercase tracking-wider border-r-2 border-[#1A1A1A] last:border-r-0"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Status</th>
                    <th scope="col"
                        class="px-6 py-4 text-right text-xs font-black text-[#1A1A1A] uppercase tracking-wider"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y-2 divide-[#1A1A1A]">
                @forelse ($projects as $project)
                    <tr class="hover:bg-[#F5F3EF] transition-colors">
                        <td class="px-6 py-4 border-r-2 border-[#1A1A1A] last:border-r-0">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 h-12 w-12 border-2 border-[#1A1A1A] rounded-md overflow-hidden bg-gray-100">
                                    @if($project->image)
                                        <img class="h-full w-full object-cover" src="{{ image_url($project->image) }}"
                                            alt="">
                                    @else
                                        <div
                                            class="h-full w-full flex items-center justify-center bg-[#F5F3EF] text-[#1A1A1A] font-bold text-xs">
                                            IMG</div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-[#1A1A1A]">{{ $project->title }}</div>
                                    <div class="text-xs text-[#3D3D3D] truncate max-w-xs font-medium">
                                        {{ Str::limit($project->description, 50) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 border-r-2 border-[#1A1A1A] last:border-r-0">
                            <span
                                class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded border-2 border-[#1A1A1A] bg-white text-[#1A1A1A]">
                                {{ $project->category === 'real life project' ? 'Real-Life' : 'Personal' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-[#1A1A1A] last:border-r-0">
                            @if($project->featured)
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded border-2 border-[#1A1A1A] bg-[#FF6B55] text-white shadow-[2px_2px_0px_0px_#1A1A1A]">
                                    ★ Featured
                                </span>
                            @else
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded border-2 border-[#1A1A1A] bg-white text-[#3D3D3D]">
                                    Standard
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="inline-block px-3 py-1 bg-white border-2 border-[#1A1A1A] rounded text-[#1A1A1A] font-bold hover:bg-[#1A1A1A] hover:text-white transition-colors mr-2">
                                Edit
                            </a>
                            <button wire:click="delete({{ $project->id }})"
                                wire:confirm="Are you sure you want to delete this project?"
                                class="inline-block px-3 py-1 bg-white border-2 border-[#1A1A1A] rounded text-red-600 font-bold hover:bg-red-600 hover:text-white transition-colors">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-[#3D3D3D]">
                                <svg class="w-12 h-12 mb-4 text-[#1A1A1A] opacity-20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                                <p class="text-lg font-bold" style="font-family: 'Space Grotesk', sans-serif;">No Projects
                                    Found</p>
                                <p class="text-sm">Start building something awesome!</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</div>