@extends('layouts.city.main')
@php
    use App\Http\Controllers\WeatherController;
@endphp
@section('content')

    <div class="row">

        @foreach($weatherInfo as $info)

            {{ setlocale(LC_TIME, 'fr_FR.UTF-8') }}

            <div class="row box">

                <!-- Information méteo des villes -->

                <div class="col-md-10 col-sm-10 col-md-offset-1 mb">
                    <div class="white-panel pn donut-chart">
                        <div class="white-header ">
                            <h2><b>{{ $info['city']['name'] }} - {{ $info['city']['country'] }},
                                    Température {{ $info['list'][0]['main']['temp'] }} °C</b></h2>
                        </div>

                        <h3>Prévision sur une periode de 5 jours chaque 3 heures</h3>
                        <div class="nav-cose">
                            <ul class="sidebar-menu">
                                @foreach($info['list'] as $days)

                                    <li class="sub-menu">
                                        <a class="active">
                                            <i class="fa fa-long-arrow-down"></i>
                                            <span class="text-uppercase text">{{ strftime("%a", strtotime(strstr($days['dt_txt'], ' ', true))) }}
                                                 | {{ date('H:i:s', $days['dt']) }} :
                                                @if($days['sys']['pod'] == 'd')
                                                    Jour
                                                @else
                                                    Nuit
                                                @endif
                                            </span>
                                            <span>
                                                {{ $days['main']['feels_like'] }}
                                                            °<img
                                                    src="https://openweathermap.org/img/wn/{{ $days['weather'][0]['icon'] }}@2x.png"
                                                    alt="icône du temps"></span>
                                        </a>
                                        <ul class="sub">
                                            <li>
                                                <br>
                                                <ul>
                                                    <li class="pull-left text-uppercase"> {{ $days['weather'][0]['description'] }}
                                                        <br>
                                                        <i class="fa fa-send"></i>
                                                        Vent
                                                        {{ $days['wind']['speed'] }}m/s
                                                        - {{ WeatherController::degreVersDirection( $days['wind']['deg'] ) }}
                                                    </li>
                                                    <li class="text-uppercase centered"><i class="fa fa-tint"></i> Humidité
                                                        <br>{{ $days['main']['humidity'] }}%
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <br>
                                                <ul>
                                                    <li class="pull-left text-uppercase"><i class="fa fa-thermometer-empty"></i>
                                                        Temp min <br> {{ $days['main']['temp_min'] }}°
                                                    </li>
                                                    <li class="text-uppercase centered"><i class="fa fa-thermometer-full"></i>
                                                        Temp. max <br> {{ $days['main']['temp_max'] }}°
                                                    </li>
                                                </ul>
                                            </li>
                                            {{--FrH,A&$tjA5Au9U--}}
                                            <li>
                                                <br>
                                                <ul>
                                                    <li class="pull-left text-uppercase"><i class="fa fa-cog"></i>
                                                        Pression <br> {{ $days['main']['pressure'] }}hPa>
                                                    </li>
                                                    <li class="text-uppercase centered"><i class="fa fa-cloud"></i> Nuages
                                                        <br> {{ $days['clouds']['all'] }}%
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <br>
                                                <ul>
                                                    <li class="pull-left text-uppercase"><i class="fa fa-eye"></i>
                                                        Vibilité <br> {{ $days['visibility'] }}m>
                                                    </li>
                                                    <li class="text-uppercase centered"><i class="fa fa-umbrella"></i> Risque
                                                        de pluie
                                                        <br> {{ $days['pop'] * 100}}%
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <br>
                                                <ul>
                                                    <li class="pull-left text-uppercase text-warning"><i class="fa fa-certificate"></i>
                                                        Levée <br> {{  date('H:i:s' , $info['city']['sunrise']) }}</li>
                                                    <li class="text-uppercase text-warning centered"><i
                                                            class="fa fa-moon-o"></i> Couchée
                                                        <br> {{ date('H:i:s', $info['city']['sunset']) }}</li>
                                                </ul>
                                                <br>
                                            </li>
                                        </ul>
                                        <br>
                                    </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
