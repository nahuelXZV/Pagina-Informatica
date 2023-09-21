    {{-- NAV --}}
    <nav class=" w-full bg-[#00346f] opacity-90 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('welcome') }}" class="flex items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Escudo_FICCT.png/640px-Escudo_FICCT.png"
                    class="h-12 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">FICCT</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-bold flex flex-col p-2 md:p-0 mt-4 rounded-lg md:flex-row  md:mt-0 md:border-0  ">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block py-1 pl-3 pr-4 text-white rounded  md:p-0 md:px-2 hover:underline "
                            aria-current="page">INICIO</a>
                    </li>
                    <li>
                        <a href="{{ route('acerca') }}"
                            class="block py-1 pl-3 pr-4 text-white rounded  md:p-0 md:px-2 hover:underline "
                            aria-current="page">ACERCA NOSOTROS</a>
                    </li>
                    <li>
                        <a href="{{ route('plan_estudio') }}"
                            class="block py-1 pl-3 pr-4 text-white rounded  md:p-0 md:px-2 hover:underline "
                            aria-current="page">PLAN ESTUDIO</a>
                    </li>
                    <li>
                        <a href="{{ route('noticias') }}"
                            class="block py-1 pl-3 pr-4 text-white rounded  md:p-0 md:px-2 hover:underline "
                            aria-current="page">NOTICIAS</a>
                    </li>
                    <li>
                        <a href="{{ route('tramites') }}"
                            class="block py-1 pl-3 pr-4 text-white rounded  md:p-0 md:px-2 hover:underline "
                            aria-current="page">TRAMITES</a>
                    </li>
                    <li>
                        <a href="https://www.soe.uagrm.edu.bo/" target="_blank"
                            class="block py-1 pl-3 pr-4 text-white rounded  md:p-0 md:px-2 hover:underline "
                            aria-current="page">POSTGRADO</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
