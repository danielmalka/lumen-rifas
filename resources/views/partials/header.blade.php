<nav id="site-menu" class="flex flex-col sm:flex-row w-full justify-between items-center px-4 sm:px-6 py-1 bg-white shadow sm:shadow-none border-t-4 border-b-2 border-black">
    <div class="w-full sm:w-auto self-start sm:self-center flex flex-row sm:flex-none flex-no-wrap justify-between items-center">
        <a href="{{ route('home') }}" class="no-underline py-1"><h1 class="font-bold text-lg tracking-widest">{{ env('APP_NAME') }}</h1></a>
        <button id="menuBtn" class="hamburger block sm:hidden focus:outline-none" type="button" onclick="navToggle();">
            <span class="hamburger__top-bun"></span><span class="hamburger__bottom-bun"></span>
        </button>
    </div>
    <div id="menu" class="w-full sm:w-auto self-end sm:self-center sm:flex flex-col sm:flex-row items-center h-full py-1 pb-4 sm:py-0 sm:pb-0 hidden">
        <a class="text-dark font-bold hover:text-red text-lg w-full no-underline sm:w-auto sm:pr-4 py-2 sm:py-1 sm:pt-2" href="{{ route('home') }}">Lista de Rifas</a>
        <a class="text-dark font-bold hover:text-red text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 sm:pt-2" href="#">Meus Numeros</a>
    </div>
</nav>
