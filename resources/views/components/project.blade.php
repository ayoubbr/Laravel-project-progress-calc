<li class="{{ !$project->isChild() ? 'first' : null }}">
    <span style="display: flex; gap:10px" class="treespan d-flex">
        <div class="relative d-flex cursor-pointer align-center text-left">

            <i class="btn fa-solid fa-bars-staggered"></i>

            <div class="list hidden absolute z-10 mt-2 w-56 
            origin-top-right rounded-md bg-white shadow-lg 
            ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/projects/{{$project->id}}/child/create"  class="text-gray-700 block px-4 py-2 text-sm">
                        <i class="ml-1 mr-3 fa-solid fa-plus"></i> Add Child project
                    </a>
                </div>
            </div>
        </div>
        {{ $project->title }}
        <div class="d-flex ml-auto gap-1.5 text-sm">
            <p class="w-24 text-center">{{ $project->type }}</p>
            <p class="w-24 text-center">{{ $project->progress }}</p>
        </div>
    </span>
    <x-projects :projects="$project->children" />
</li>
