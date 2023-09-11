@extends('layouts.city.main')

@section('content')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-ful">
                                <div class="flex items-center justify-center rounded-full">
                                    <img src="{{ asset('img/ui-danro.jpg') }}">
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Documentation</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Bienvenue sur Weather Dash
                                </p>
                            </div>

                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-ful">

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Veuillez vous connectez ou vous enregistrer pour avoir acces au informations méteorologique
                                    des villes de Lomé, Kara et Dapaong.
                                </p>
                            </div>
                    </div>
                </div>
        </div>
@endsection
