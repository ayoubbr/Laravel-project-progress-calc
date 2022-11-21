<li class="{{ !$project->isChild() ? 'first' : null }}">
    <span style="" class="treespan d-flex">
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
        <div class="d-flex ml-auto gap-1.5 align-center">
            <div class="progress-bar">
                <div @class([
                    'progress-bar',
                    
                    'bg-red-500' => $project->progress <= 25,
                    'bg-sky-500' => $project->progress >= 26,
                    'bg-yellow-500' => $project->progress >= 50,
                    'bg-orange-500' => $project->progress >= 75,
                    'bg-green-500' => $project->progress == 100,
                ]) style="width: {{ $project->progress }}%" ></div>
            </div>
            <p class="w-36 text-center text-red">{{ $project->progress }} %</p>
            {{-- <p class="w-36 text-center">{{ $project->type }}</p> --}}
        </div>
    </span>
    <x-projects :projects="$project->children" />
</li>
