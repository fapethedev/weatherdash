@extends('layouts.city.main')

@section('content')

    <div class="row">
        <div class="col-lg-9 main-chart">

            <div class="row mtbox">
                <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                    <div class="box1">
                        <span class="li_heart"></span>
                        <h3>La Méteo</h3>
                    </div>
                    <p>Au Coeur de votre quotidien</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_cloud"></span>
                        <h3>OpenWeather</h3>
                    </div>
                    <p>Fournisseur officiel de données météorologique</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_stack"></span>
                        <h3>23</h3>
                    </div>
                    <p>You have 23 unread messages in your inbox.</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_news"></span>
                        <h3>+10</h3>
                    </div>
                    <p>More than 10 news were added in your reader.</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_data"></span>
                        <h3>MySQL</h3>
                    </div>
                    <p>Sure et rapide</p>
                </div>

            </div>

            @foreach($weatherInfo as $info)

                <div class="row mt">
                <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn donut-chart">
                        <div class="white-header">
                            <h2>{{$info['city']['name']}} - {{ $info['city']['country'] }}, Temperature {{ $info['list'][0]['main']['temp'] }}°</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p>
                                    <i class="fa fc-agenda-days"></i>
                                    <span class="text-uppercase text">{{ strftime("%a", strtotime(strstr($info['list'][0]['dt_txt'], ' ', true))) }}
                                                 | {{ date('H:i:s', $info['list'][0]['dt']) }} :
                                                @if($info['list'][0]['sys']['pod'] == 'd')
                                            Jour
                                        @else
                                            Nuit
                                        @endif
                                            </span>
                                    <span>
                                                {{ $info['list'][0]['main']['feels_like'] }}
                                                            °<img
                                            src="https://openweathermap.org/img/wn/{{ $info['list'][0]['weather'][0]['icon'] }}@2x.png"
                                            alt="icône du temps"></span>
                                </p>
                                <p class="text-uppercase">
                                   <i class="fa fa-thermometer-empty"></i>
                                    min <br> {{ $info['list'][0]['main']['temp_min'] }}°
                                </p>

                                <p class="text-uppercase">
                                   <i class="fa fa-thermometer-full"></i>
                                    max <br> {{ $info['list'][0]['main']['temp_max'] }}°
                                </p>

                                <p class="text-uppercase">
                                   <i class="fa fa-cog"></i>
                                    Pression <br> {{ $info['list'][0]['main']['pressure'] }}hPa
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goright">
                                <p class="text-uppercase text-warning"><i class="fa fa-certificate"></i>
                                    Levée <br> {{  date('H:i:s' , $info['city']['sunrise']) }}</p>
                                <p class="text-uppercase text-warning centered"><i
                                        class="fa fa-moon-o"></i> Couchée
                                    <br> {{ date('H:i:s', $info['city']['sunset']) }}</p>
                            </div>
                        </div>

                        <footer>
                            <div class="mt">
                                <p class="text-primary text-uppercase">
                                    <a href="{{ route(strtolower($info['city']['name'])) }}">
                                        Voir plus <i class="fa fa-book"></i>
                                    </a>
                                </p>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

@endsection
