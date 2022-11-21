@extends('welcome')

@section('content')
    <div class="p-5 d-flex align-center justify-center">
        {{-- <span class="d-flex justify-between p-2.5">
            <p></p>
            <div class="d-flex gap-1.5">
                <p class="w-36 text-center  mr-5">Progress</p>
               <!-- <p class="w-36 text-center"> Type</p> -->
            </div>

        </span> --}}
        <x-projects :projects="$projects" />
    </div>
    <script>
        let btns = document.querySelectorAll('.btn');
        let lists = document.querySelectorAll('.list');
        btns.forEach(el => {
            window.addEventListener('click', (event) => {
                if (event.target !== el) {
                    el.nextElementSibling.classList.add('hidden');
                }
            });
        });

        btns.forEach(element => {
            element.addEventListener('click', (event) => {
                event.target.nextElementSibling.classList
                    .toggle('hidden');
            })
        });

        let selects = document.querySelectorAll('.select');

        selects.forEach(element => {
            element.onchange = function(e) {
                element.nextElementSibling.click();
            }
        });
    </script>
@endsection
