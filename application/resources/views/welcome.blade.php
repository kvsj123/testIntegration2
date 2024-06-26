<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Browser Logo & Title -->
    <title>Home — Hackathon</title>
    <link rel="icon" href="{{ asset('img blades/erasmuslogo2.png') }}" type="image/x-icon" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
    rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css blades/welcome.blade.css') }}">
</head>

<body class="bg-teal-300">
    <header>
        <nav class="p-2 bg-black bg-opacity-50 shadow md:flex md:items-center md:justify-between fixed w-full top-0 z-50">
            <div class="flex items-center justify-between">
                <img class="h-10 inline" src="{{ asset('img blades/erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <span class="text-3xl cursor-pointer mx-10 mt-2 md:hidden block" onclick="toggleMenu()">
                    <ion-icon name="menu" id="menuIcon"></ion-icon>
                </span>

                <ul class="md:flex md:items-center md:static absolute w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden">
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/') }}" class="text x1 text-teal-500">HOME</a>
                    </li>
                     <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ route('sessions.index') }}" class="text x1 hover:text-teal-500 duration-500;">SESSIES</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/about') }}" class="text x1 hover:text-teal-500 duration-500">OVER ONS</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/contacts') }}" class="text x1 hover:text-teal-500 duration-500">CONTACT</a>
                    </li>
                </ul>
                <!--Login list icon-->
                <div x-data="{ open: false }"
                    class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10 transition-transform transform-gpu hover:scale-110">
                    <div class="relative">
                        <a href="#" @click="open = !open">
                            <img class="h-7 inline @auth bg-green-700 rounded-full @endauth"
                                src="{{ asset('img blades/loginicon.png') }}" alt="Login Icon">
                        </a>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-0 w-30 bg-white border border-red-300 dark:border-gray-700 rounded-md shadow-lg py-0">
                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <p class="text-white bg-teal-500 text-center text-xs pb-2">{{ Auth::user()->name }} <img
                                        onclick="window.location.href='{{ url('profile') }}'"
                                        class="hover:bg-red-600 h-3 inline @auth rounded-full @endauth"
                                        src="" alt="Settings Icon"></p>
                                <a href="#"
                                    class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-600 hover:text-white"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</a>
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                class="block px-5 py-2 text-sm text-gray-700 @auth hover:bg-green-500 @else hover:bg-red-600 @endauth">Log
                                in</a>
                            @if (Route::has('register'))
                            <a href="{{ url('/register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-400">Inschrijving</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
        </nav>
    </header>
<main>
<section class="flex flex-col h-screen justify-center items-center bg-cover bg-center"
    style="background-image: url('img blades/coverimg.jpg');">

    <h1 class="text-8xl font-bold text-center text-white lg:px-32">
        Blijf op de hoogte van onze 
        <span class="relative">
            <span class="bg-teal-300">H</span>
            <span class="bg-red-600">a</span>
            <span class="bg-teal-300">c</span>
            <span class="bg-red-600">k</span>
            <span class="bg-teal-300">a</span>
            <span class="bg-red-600">t</span>
            <span class="bg-teal-300">h</span>
            <span class="bg-red-600">o</span>
            <span class="bg-teal-300">n</span>
            <span class="bg-red-600">'</span>
            <span class="bg-teal-300">s</span>
        </span>!
    </h1>

    <p class="text-4xl font-bold text-center text-white lg:px-32 mt-8">Georganiseerd door Erasmushogeschool Brussel</p>
</section>





<section class="flex-1 w-full h-screen bg-gray-100">
        <ol
            class="mt-20 flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
            <li
                class="flex md:w-full items-center text-red-500 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <span
                    class="hover:text-teal-500 duration-500 flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    Home <span class="hidden sm:inline-flex sm:ms-2">inschrijving</span>
                </span>
            </li>
            <li
                class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <span
                    class="hover:text-teal-500 duration-500 flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    <span class="me-2">2</span>
                    Komende <span class="hidden sm:inline-flex sm:ms-2">sessies</span>
                </span>
            </li>
            <li class="flex items-center hover:text-teal-500 duration-500">
                <span class="me-2">3</span>
                Vul <span class="hidden sm:inline-flex sm:ms-2">formulier</span>
            </li>
        </ol>
        <div class=" p-8 md:p-0 md:flex md:items-center md:justify-evenly p-10">
            <div class="md:w-2/5 mx-auto md:mx-0">
                <img src="{{ asset('img blades/balimg.jpg') }}" alt="Votre Image" class="w-30 h-70 mb-20">
            </div>
            <div class="md:w-2/5 md:ml-8 mx-auto md:mx-0 flex flex-col md:items-start">
                <div class="flex flex-row">
                    <div class="relative flex items-end pb-12">
                        <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-600"></div>
                        <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem; /* 3px */">
                        </div>
                    </div>
                    <h2 class="text-8xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">RESERVEER!</h2>
                </div>
                <p class="text-4xl text-base mb-6 duration-500">
                    Ontdek een wereld van technologische uitdagingen en teamwork op onze hackathons! Verrijk je vaardigheden met boeiende workshops en trainingssessies, begeleid door experts. Bouw professionele relaties op en onderscheid jezelf op de arbeidsmarkt door deel te nemen aan prestigieuze hackathons. Word deel van een gemeenschap van technologieliefhebbers en ontmoet gelijkgestemde individuen. Schrijf je vandaag nog in en word een pionier in de toekomst van technologie!</p>
                <a href="{{ route('sessions.index') }}"
                    class="bg-teal-500 text-2xl text-white px-10 py-3 rounded transition duration-500 hover:bg-red-600">
                    SESSIES </a>
            </div>
</section>
    </main>

    <footer>
        <div class="bg-red-600 p-4 text-white flex flex-col md:flex-row justify-center items-center">
            <!-- Eerste kolom (data) -->
            <div class="w-full md:w-1/2 flex flex-col items-center mb-4 md:mb-0">
                <div class="flex items-center">
                    <a href="{{ url('about') }}#onze-campussen">
                        <img src="{{asset('img blades/positionicon.png')}}" class="h-6">
                    </a>
                    <p class="ml-2 text-sm">Nijverheidskaai, Anderlecht 1070</p>
                </div>
                <div class="flex items-center mt-2">
                    <a href="tel:+32499842525">
                        <img src="{{asset('img blades/icontel.png')}}" class="h-6">
                        <p class="ml-2 text-sm">
                            <a href="tel:+32499842525">+32 499 84 25 25
                        </p>
                </div>
                <div class="flex items-center mt-2">
                    <a href="mailto:info.va.ehb@gmail.com">
                        <img src="{{asset('img blades/messagelogo.png')}}" class="h-6">
                        <p class="ml-2 text-sm">
                            <a href="mailto:info.va.ehb@gmail.com"></a> info.va.ehb@gmail.com
                        </p>
                </div>
            </div>

            <!-- Tweede kolom (logo erasmus) -->
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <img class="h-5" src="{{ asset('img blades/erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <p class="mt-2 text-sm">&#169 Erasmushogeschool</p>
            </div>

            <!-- Derde kolom (social media)-->
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="flex space-x-2">
                    <a href="https://www.facebook.com/erasmushogeschool" class="text-white"><img
                            src="{{asset('img blades/iconfacebook.png')}}" class="h-6"></a>
                    <a href="https://www.linkedin.com/school/erasmushogeschool-brussel/" class="text-white"><img
                            src="{{asset('img blades/iconlinkedin.png')}}" class="h-6"></a>
                    <a href="https://www.youtube.com/user/ehbrussel" class="text-white"><img
                            src="{{asset('img blades/iconyoutube.png')}}" class="h-6"></a>
                </div>
                <div class="text-center mt-2">
                    <p class="text-sm mx-2 pl-4 pr-6">
                        Blijf op de hoogte van onze hackathons en meer door de EhB Hackathon-app te volgen op sociale media! Ontvang het laatste nieuws, updates en spannende momenten rechtstreeks van het hackathon-seizoen van EhB.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4V1JRM/CJhqFWE4/gs1SMgeu+2SL1OrS5t9jQQI4Im7oJ/rRlFxG/X+De4eL9ES"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js blades/welcome.blade.js') }}"></script>
</body>

</html>