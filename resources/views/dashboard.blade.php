<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css', 'resources/js/app.js')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NoGooC</title>
</head>

<body>
    @include('sweetalert::alert')
    @include('partials/navbar')
    @include('partials/modal')

    <div class="bg-[#F8FCFF] w-screen h-nav">
        <div class="h-full flex flex-wrap m-5 border border-slate-400 rounded-md">

            @foreach ($notes as $note)
                <div id="note_{{ $note->id }}"
                    class="border m-2 p-4 rounded-md w-[20%] h-[35%] flex-col justify-between">
                    <div class="w-full h-[75%] gap-y-2 overflow-hidden">
                        <h2 class="font-semibold border-b-2">{{ $note->title }}</h2>
                        <p class="font-normal text-slate-700 text-md">{{ $note->content }}</p>
                    </div>
                    @if (auth()->check())
                        <div class="w-full h-fit flex flex-row">
                            <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold px-2 py-2 rounded-md">Delete
                                </button>
                            </form>

                            <button type="button" data-modal-target="update-modal{{ $note->id }}"
                                data-modal-toggle="update-modal{{ $note->id }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-2 py-2 rounded-md ml-2">Edit
                            </button>

                            <x-update-modal :id="$note->id" />

                        </div>
                    @endif
                </div>
            @endforeach


            <button class="border m-2 p-4 rounded-md w-[17.5%] h-[35%]" data-modal-target="authentication-modal"
                data-modal-toggle="authentication-modal">
                <img src="add.png" alt="" class="object-fit mx-auto">
            </button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
