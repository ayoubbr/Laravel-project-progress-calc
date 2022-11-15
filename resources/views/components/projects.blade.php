<ol class="wtree">
    @foreach ($projects as $project)
            <x-project :project="$project" />
    @endforeach
</ol>
