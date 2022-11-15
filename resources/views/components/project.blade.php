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


                    {{-- <a class="text-gray-700 block px-4 py-2 text-sm">
                        <i class="fa-solid fa-eye ml-1 mr-3"></i>
                        View Details
                    </a>

                    <a class="text-gray-700 block px-4 py-2 text-sm">
                        <i class="fa-solid fa-plus ml-1 mr-3"></i>
                        Add Comment
                    </a>
                    <a class="text-gray-700 block px-4 py-2 text-sm">
                        <i class="ml-1 fa-solid fa-pencil mr-3"></i>
                        Edit
                    </a>
                    <form class="text-gray-700 block px-4 py-2 text-sm" action="" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit">
                            <i class="ml-1 fa-solid fa-trash mr-3"></i>
                            Delete
                        </button>

                    </form> --}}
                </div>
            </div>
        </div>
        {{ $project->title }}
        <div class="d-flex ml-auto gap-1.5 text-sm">
            {{-- <p class="w-24 text-center">{{ $project->description }}</p> --}}
            <p class="w-24 text-center">{{ $project->type }}</p>
            <p class="w-24 text-center">{{ $project->progress }}</p>
        </div>
    </span>
    <x-projects :projects="$project->children" />
</li>
