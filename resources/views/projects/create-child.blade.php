@extends('welcome')

@section('content')
    <div class="card">
        <div>
            <header class="text-center d-flex align-center justify-center p-7 bg-emerald-500">
                <h2 class="text-2xl">Create a Project child</h2>
            </header>
            <form method="POST" action="/projects/child/{{ $project->id }}" enctype="multipart/form-data" class="p-7 create-form">
                @csrf
                <div class=" grid grid-cols-2 gap-4">
                    <div>
                        <label for="title" class="inline-block text-lg mb-2">Title</label>
                        <input type="text" class="border border-gray-500 rounded p-2 w-full" placeholder="Title"
                            name="title" value="{{ old('title') }}" />

                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="type" class="inline-block text-lg mb-2">Type</label>
                        <select id="type" name="type"
                            class="type-select cursor-pointer border border-gray-500 rounded p-2 w-full">
                            <option value="">Select Type</option>
                            <option value="Master">Master</option>
                            <option value="Normal">Normal</option>
                        </select>

                        @error('type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class=" grid grid-cols-2 gap-4">
                    <div>
                        <label for="progress" class="inline-block text-lg mb-2">Progress</label>
                        <input type="number" min="0" max="100"
                            class="border border-gray-500 rounded p-2 w-full" name="progress" id="">
                    </div>

                    <div>
                        <label for="uploads" class="inline-block text-lg mb-2">
                            Uploads
                        </label>
                        <input type="file"
                            class="cursor-pointer border border-gray-500 rounded p-1
                            block w-full text-sm text-slate-500 
                            file:mr-7 file:cursor-pointer file:px-5 file:py-2 file:rounded-full 
                            file:border-0 file:text-sm file:font-semibold  
                            file:bg-emerald-500 file:text-white-700 hover:file:bg-emerald-600 w-full"
                            name="uploads[]" multiple />
                        @error('uploads')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1">
                    <div>
                        <label for="description" class="inline-block text-lg mb-2">Comment</label>


                        <textarea class="comment-text border border-gray-500 rounded p-2 w-full" name="description" id="description"
                            rows="4"></textarea>

                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid grid-cols-1 ">
                    <div class="">
                        <button
                            class="bg-stone-900 text-white rounded py-2 px-4 
                        hover:bg-slate-500  ">
                            Create Task
                        </button>

                        <a href="/"
                            class="text-black 
                         ml-4 py-2   px-4 rounded-md hover:bg-slate-500">
                            Go Back
                            <i class="fa-regular fa-circle-right"></i>
                        </a>
                    </div>
            </form>
        </div>
    </div>
@endsection
