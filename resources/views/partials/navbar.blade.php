<nav class="bg-white drop-shadow-sm md:flex justify-end px-10">
    <div class="flex flex-wrap items-center justify-between md:justify-normal min-h-[70px] p-4 md:p-0 w-full">
        <a href="https://flowbite.com/" class="md:hidden flex items-center space-x-3">
            <span class="self-center text-2xl font-semibold whitespace-nowrap md:hidden">NoGooc</span>
        </a>

        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default" aria-expanded="false">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="hidden w-full md:flex h-full md:w-full md:justify-between md:h-full items-center mt-5 md:mt-0"
            id="navbar-default">
            <a href="/" class=" items-center">
                <span class="text-black text-2xl font-semibold whitespace-nowrap">NoGooc</span>
            </a>
            @if (Auth::check())
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="block text-white hover:bg-slate-950 bg-BlackPrimary font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                    type="button">
                    <p>{{ Auth::user()->name }}</p>
                </button>
            @else
                <div class="h-fit flex w-full md:w-fit justify-evenly md:justify-end mt-5 md:mt-0 md:gap-x-5">
                    <x-button message="Daftar" type="" link="/register" classname="py-2" color="Secondary"
                        icons="" />
                    <x-button message="Masuk" type="" link="/login" classname="py-2" color="Primary"
                        icons="" />
                </div>
            @endif

        </div>
    </div>
</nav>
<x-logout-modal />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
