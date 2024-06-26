<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Browser Logo & Title -->
    <title>Over Ons — Hackathon</title>
    <link rel="icon" href="{{ asset('img blades/erasmuslogo2.png') }}" type="image/x-icon" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css blades/welcome.blade.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
            integrity = "sha512-xxcJrt0DJGmWdNvhLvGFKV5qZjF5gOvveaBB8VLVJtfBuzxZZ5l70oVxXmYmmujpZyGx2t49geTmO2NlQmRj5g=="
            crossorigin = "" ></script>
</head>

<body class="flex flex-col h-screen">
    <header>
        <nav class="p-2 bg-red shadow md:flex md:items-center md:justify-between fixed w-full top-0 z-50"
            style="background-color: red;">
            <div class="flex items-center justify-between">
                <img class="h-10 inline" src="{{ asset('img blades/erasmuslogo2.png') }}" alt="Erasmushogeschool Logo">
                <span class="text-3xl cursor-pointer mx-10 mt-2 md:hidden block" onclick="toggleMenu()">
                    <ion-icon name="menu" id="menuIcon"></ion-icon>
                </span>

                <!--Navigation list -->
                <ul class="md:flex md:items-center md:static absolute bg-red w-full left-0 md:py-0 py-4 md:pl-0 pl-7 top-[60px] hidden"
                    style="background-color: red;">
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">DASHBOARD</a>
                        @else
                        <a href="{{ url('/') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">HOME</a>
                        @endauth
                    </li>
                                                          <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/sessions') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">SESSIES</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/about') }}" class="text x1 text-teal-500" style="background-color: red;">OVER
                            ONS</a>
                    </li>
                    <li class="mx-4 my-0 md:my-0 bg-red">
                        <a href="{{ url('/contacts') }}" class="text x1 hover:text-teal-500 duration-500"
                            style="background-color: red;">CONTACT</a>
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
                                        class="hover:bg-red-500 h-3 inline @auth rounded-full @endauth"
                                        src="{{ asset('img blades/iconsettings.png') }}" alt="Settings Icon"></p>
                                <a href="#"
                                    class="block px-5 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</a>
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                class="block px-5 py-2 text-sm text-gray-700 @auth hover:bg-green-500 @else hover:bg-red-500 @endauth">Log
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

    <main class="mt-20">
        <div class="flex flex-row items-center sm:ml-0 lg:ml-60 xl:ml-60">
            <div class="relative flex items-end pb-12">
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">OVER ONS</h2>
        </div>

        <p
            class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
            EhB Voetbal App (EhB VA) werd bedacht door Nawfel Ajari en ontwikkeld in 2023 in samenwerking met
            Kristian Vasiaj, Jack Thyssens, Ismael Bouzrouti en Soufian Jaâtar voor een schoolproject onder toezicht van
            de informaticadocenten Robin Bervoets, Tom Aertssens en Ruben Dejonckheere. Met de steun van STUVO en Enigma
            werd het gelanceerd in 2024 met als doel het bevorderen van een vermakelijk en sportief aspect van de
            Erasmushogeschool Brussel en haar acht campussen.</p>
        <p
            class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
            EhB
            Voetbal App haalt zijn inspiratie uit de
            Erasmushogeschool Brussel (EhB), die haar naam ontleent aan de humanistische filosoof Desiderius Erasmus. In
            lijn met de EhB kiezen wij voor een humanistisch perspectief in onze benadering. Het recht op vrijheid en
            menselijke waardigheid, het geloof in menselijk potentieel, open en rationele dialoog, en het nemen van
            zelfverantwoordelijkheid staan centraal in onze missie. Deze verantwoordelijkheid voor de wereld, de
            maatschappij en onszelf vertaalt zich in duurzaamheid in de breedste zin van het woord.</p>

        <p
            class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
            Als je de vraag
            krijgt welke sport het populairst is in België, zal je waarschijnlijk antwoorden... wielrennen! Dat klopt
            helemaal, en we kunnen zelfs tennis aan dat lijstje toevoegen. Wij geven echter de voorkeur aan teamsporten,
            omdat dit een mentale impact heeft op samenleven en de samenwerking tussen studenten bevordert. Dit is iets
            fundamenteels en zeer representatief voor onze school. Bij EhB Voetbal App geloven we in de kracht
            van sport om niet alleen individuele vaardigheden te ontwikkelen, maar ook om een hechte gemeenschap te
            creëren waarin samenwerking en vriendschap centraal staan. Doe mee en ontdek hoe wij sport en teamgeest
            vieren!</p>

        <div class="relative flex flex-row-reverse items-center ml-10">
            <div class="absolute top-0 right-0 flex flex-col items-end">
                <div class="mb-3 h-32 w-4 bg-red-500"></div>
                <div class="mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
    </main>


    <main class="mt-20">

        <div class="flex flex-row items-center sm:ml-0 lg:ml-60 xl:ml-60">
            <div class="relative flex items-end pb-12">
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>

                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">REGELS</h2>
        </div>

        <p
            class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
            Wij heten alle studenten van de Erasmushogeschool Brussel
            van harte welkom bij het EhB Voetbal App, een opwindend evenement dat ontworpen is om sportiviteit,
            teamgeest en plezier te bevorderen. Voor een succesvol verloop van het toernooi vragen we alle
            deelnemers om de regels en richtlijnen zorgvuldig door te nemen en zich hieraan te houden.</p>
        </div>

        <p
            class="pl-2 pr-2 sm:pl-2 sm:pr-2 md:pl-2 md:pr-2 lg:pl-80 lg:pr-80 xl:pl-80 xl:pr-80 text-1xl text-center pb-5">
            Met deze puntentelling komt de cruciale vraag naar voren:
            welk team zal zichzelf tot kampioen van de EhB-competitie kronen aan het einde van dit seizoen? Elk team
            heeft de kans om zijn talent en vastberadenheid te tonen en op te klimmen naar de hoogste positie in de
            ranking. De spanning stijgt en de competitie is fel. Wie zal de felbegeerde titel mee naar huis nemen?
            Het antwoord ligt in de handen van de gepassioneerde en getalenteerde teams die deelnemen aan het
            Interschool Voetbaltoernooi. Laat het spel beginnen en moge het beste team zegevieren!</p>
        </div>
    </main>

    <main id="onze-campussen" class="mt-20">

        <div class="flex flex-row items-center sm:ml-0 lg:ml-60 xl:ml-60">
            <div class="relative flex items-end pb-12">
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-red-500"></div>
                <div class="-mr-1.5 mb-3 h-32 w-4 bg-teal-500" style="margin-bottom: -0.375rem;"></div>
            </div>
            <h2 class="text-7xl font-bold mt-2 mb-4 duration-500 pl-5 pb-15">PLAATSEN</h2>
        </div>

        <div class="w-full flex flex-row items-center justify-evenly">
            <img src="{{ asset('img blades/erasmusgebouw.png') }}" alt="" class="w-1/2 h-200 md:w-1/5 mb-4">
            <div class="flex flex-col ml-4">
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img blades/positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Nijverheidskaai 170, 1070 Anderlecht (Campus Kaai)</p>
                </div>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img blades/positionicon.png') }}" class="h-7">
                    <p class="ml-2 text-sm">Zespenningenstraat 70, 1000 Brussel (Campus Bloemenhof)</p>
                </div>
            </div>
        </div>
        <div id="map" style="height: 400px;"></div>
    </main>

    <footer>
        <div class="bg-red p-4 text-white flex flex-col md:flex-row justify-center items-center">
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
    <script src="{{ asset('js blades/about.blade.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
            const map = L.map('map').setView([50.85045, 4.34878], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        L.marker([50.841778, 4.322869], { icon: L.divIcon({ className: 'red-marker', html: '<div></div>' }) }).addTo(map)
            .bindPopup('Campus Kaai');

        L.marker([50.847519, 4.343530]).addTo(map)
            .bindPopup('Campus Bloemenhof');
    </script>
</body>

</html>