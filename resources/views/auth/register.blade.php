<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <title>TrueNorth Technology - Cadastro</title>
    <style type="text/css">
        .st0 {
            fill: none;
            stroke: currentColor;
            stroke-width: 20;
            stroke-linecap: round;
            stroke-miterlimit: 3;
        }

    </style>
</head>

<body>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="py-12 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="w-10 text-indigo-500">
                    </div>
                    <div class="text-2xl text-indigo-800 tracking-wide ml-2 font-semibold">TrueNorth Technology</div>
                </div>
            </div>
            @if (count($errors) > 0)
                <div role="alert" class="p-8">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Ops! Há algo errado.
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Cadastro</h2>
                <div class="mt-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-sm font-bold text-gray-700 tracking-wide">Usuário</div>
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="button" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M23.995 24h-1.995c0-3.104.119-3.55-1.761-3.986-2.877-.664-5.594-1.291-6.584-3.458-.361-.791-.601-2.095.31-3.814 2.042-3.857 2.554-7.165 1.403-9.076-1.341-2.229-5.413-2.241-6.766.034-1.154 1.937-.635 5.227 1.424 9.025.93 1.712.697 3.02.338 3.815-.982 2.178-3.675 2.799-6.525 3.456-1.964.454-1.839.87-1.839 4.004h-1.995l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 4.983 0 8.451 4.766 3.732 13.678-1.551 2.928 1.65 3.624 5.09 4.418 2.979.688 3.178 2.143 3.178 4.663l-.005 1.241zm-13.478-6l.91 2h1.164l.92-2h-2.994zm2.995 6l-.704-3h-1.615l-.704 3h3.023z" />
                                    </svg>
                                </button>
                            </span>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 pl-10"
                                type="text" placeholder="Sam Smith" autocomplete="off" name="name" required />
                        </div>
                        <div class="text-sm font-bold text-gray-700 tracking-wide mt-8">Endereço de e-mail</div>
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="button" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                                    </svg>
                                </button>
                            </span>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 pl-10"
                                type="email" placeholder="sam@gmail.com" autocomplete="off" name="email" required />
                        </div>
                        <div class="mt-8 relative text-gray-600 focus-within:text-gray-400">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Senha
                                </div>
                            </div>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="button" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        class="mt-5">
                                        <path
                                            d="M10 16c0-1.104.896-2 2-2s2 .896 2 2c0 .738-.404 1.376-1 1.723v2.277h-2v-2.277c-.596-.347-1-.985-1-1.723zm11-6v14h-18v-14h3v-4c0-3.313 2.687-6 6-6s6 2.687 6 6v4h3zm-13 0h8v-4c0-2.206-1.795-4-4-4s-4 1.794-4 4v4zm11 2h-14v10h14v-10z" />
                                    </svg>
                                </button>
                            </span>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 pl-10"
                                type="password" placeholder="Insira uma senha" name="password" required />
                        </div>
                        <div class="mt-8 relative text-gray-600 focus-within:text-gray-400">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Confirmação
                                </div>
                            </div>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="button" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        class="mt-5">
                                        <path
                                            d="M10 16c0-1.104.896-2 2-2s2 .896 2 2c0 .738-.404 1.376-1 1.723v2.277h-2v-2.277c-.596-.347-1-.985-1-1.723zm11-6v14h-18v-14h3v-4c0-3.313 2.687-6 6-6s6 2.687 6 6v4h3zm-13 0h8v-4c0-2.206-1.795-4-4-4s-4 1.794-4 4v4zm11 2h-14v10h14v-10z" />
                                    </svg>
                                </button>
                            </span>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 pl-10"
                                type="password" placeholder="Confirme sua senha" name="password_confirmation"
                                required />
                        </div>
                        <div class="mt-10">
                            <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                    <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                        Já possui uma conta? <a href="{{ route('login') }}"
                            class="cursor-pointer text-indigo-600 hover:text-indigo-800">Fazer login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen">
            <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                <svg class="w-5/6 mx-auto" xmlns="http://www.w3.org/2000/svg" id="f080dbb7-9b2b-439b-a118-60b91c514f72"
                    data-name="Layer 1" viewBox="0 0 528.71721 699.76785">
                    <title>Login</title>
                    <rect y="17.06342" width="444" height="657" fill="#535461" />
                    <polygon points="323 691.063 0 674.063 0 17.063 323 0.063 323 691.063" fill="#7f9cf5" />
                    <circle cx="296" cy="377.06342" r="4" fill="#535461" />
                    <polygon
                        points="296 377.66 298.773 382.463 301.545 387.265 296 387.265 290.455 387.265 293.227 382.463 296 377.66"
                        fill="#535461" />
                    <polygon points="337 691.063 317.217 691 318 0.063 337 0.063 337 691.063" fill="#7f9cf5" />
                    <g opacity="0.1">
                        <polygon points="337.217 691 317.217 691 318.217 0 337.217 0 337.217 691" fill="#fff" />
                    </g>
                    <circle cx="296" cy="348.06342" r="13" opacity="0.1" />
                    <circle cx="296" cy="346.06342" r="13" fill="#535461" />
                    <line x1="52.81943" y1="16.10799" x2="52.81943" y2="677.15616" fill="none" stroke="#000"
                        stroke-miterlimit="10" stroke-width="2" opacity="0.1" />
                    <line x1="109.81943" y1="12.10799" x2="109.81943" y2="679.15616" fill="none" stroke="#000"
                        stroke-miterlimit="10" stroke-width="2" opacity="0.1" />
                    <line x1="166.81943" y1="9.10799" x2="166.81943" y2="683" fill="none" stroke="#000"
                        stroke-miterlimit="10" stroke-width="2" opacity="0.1" />
                    <line x1="223.81943" y1="6.10799" x2="223.81943" y2="687.15616" fill="none" stroke="#000"
                        stroke-miterlimit="10" stroke-width="2" opacity="0.1" />
                    <line x1="280.81943" y1="3.10799" x2="280.81943" y2="688" fill="none" stroke="#000"
                        stroke-miterlimit="10" stroke-width="2" opacity="0.1" />
                    <ellipse cx="463.21721" cy="95.32341" rx="39.5" ry="37" fill="#2f2e41" />
                    <path d="M683.8586,425.93948l-10,14s-48,10-30,25,44-14,44-14l14-18Z"
                        transform="translate(-335.6414 -100.11607)" fill="#ffb8b8" />
                    <path d="M735.8586,266.93948s-13,0-16,18-6,78-6,78-42,55-35,62,15,20,20,18,48-61,48-61Z"
                        transform="translate(-335.6414 -100.11607)" fill="#7f9cf5" />
                    <path d="M735.8586,266.93948s-13,0-16,18-6,78-6,78-42,55-35,62,15,20,20,18,48-61,48-61Z"
                        transform="translate(-335.6414 -100.11607)" opacity="0.1" />
                    <path d="M775.8586,215.93948s-1,39-13,41-8,15-8,15,39,23,65,0l5-12s-18-13-10-31Z"
                        transform="translate(-335.6414 -100.11607)" fill="#ffb8b8" />
                    <path
                        d="M708.8586,455.93948s-59,110-37,144,55,104,60,104,33-14,31-23-32-76-40-82-4-22-3-23,34-54,34-54-1,84,3,97-1,106,4,110,28,11,32,5,16-97,8-118l15-144Z"
                        transform="translate(-335.6414 -100.11607)" fill="#2f2e41" />
                    <path d="M762.8586,722.93948l-25,46s-36,26-11,30,40-6,40-6l22-16v-46Z"
                        transform="translate(-335.6414 -100.11607)" fill="#2f2e41" />
                    <path
                        d="M728.8586,696.93948l13,31s5,13,0,16-19,21-10,23a29.29979,29.29979,0,0,0,5.49538.5463,55.56592,55.56592,0,0,0,40.39768-16.43936l8.10694-8.10694s-27.77007-63.94827-27.385-63.47414S728.8586,696.93948,728.8586,696.93948Z"
                        transform="translate(-335.6414 -100.11607)" fill="#2f2e41" />
                    <circle cx="465.21721" cy="105.82341" r="34" fill="#ffb8b8" />
                    <path
                        d="M820.3586,253.43948l-10.5,10.5s-32,12-47,0c0,0,5.5-11.5,5.5-10.5s-43.5,7.5-47.5,25.5,3,49,3,49-28,132-17,135,114,28,113,9,8-97,8-97l35-67s-5-22-17-29S820.3586,253.43948,820.3586,253.43948Z"
                        transform="translate(-335.6414 -100.11607)" fill="#7f9cf5" />
                    <path d="M775.8586,448.93948l-13,8s-50,34-24,40,41-24,41-24l10-12Z"
                        transform="translate(-335.6414 -100.11607)" fill="#ffb8b8" />
                    <path
                        d="M849.8586,301.93948l9,9s6,84-6,101-67,63-70,60-22-18-18-20,57.18287-57.56942,57.18287-57.56942l-4.18287-77.43058Z"
                        transform="translate(-335.6414 -100.11607)" opacity="0.1" />
                    <path
                        d="M853.8586,298.93948l9,9s6,84-6,101-67,63-70,60-22-18-18-20,57.18287-57.56942,57.18287-57.56942l-4.18287-77.43058Z"
                        transform="translate(-335.6414 -100.11607)" fill="#7f9cf5" />
                    <path
                        d="M786.797,157.64461s-11.5575-4.20273-27.31774,4.72807l8.40546,2.10136s-12.60819,1.05068-14.18421,17.8616h5.77875s-3.67739,14.70955,0,18.91228l2.364-4.4654,6.82943,13.65887,1.576-6.82944,3.15205,1.05069,2.10137-11.03217s5.25341,7.88012,9.45614,8.40546V195.2065s11.5575,13.13352,15.23489,12.60818l-5.25341-7.35477,7.35477,1.576-3.152-5.25341,18.91228,5.25341-4.20273-5.25341,13.13352,4.20273,6.3041,2.6267s8.9308-20.4883-3.67739-34.67251S798.61712,151.60318,786.797,157.64461Z"
                        transform="translate(-335.6414 -100.11607)" fill="#2f2e41" />
                </svg>
            </div>
        </div>
    </div>
</body>

</html>
