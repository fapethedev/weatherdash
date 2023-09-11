@extends('layouts.city.main')

@section('content')

    <div class="row">
        <div class="col-lg-12 main-chart">
            <div class="col-lg-offset-1 row mtbox">
                <div class="col-md-2 col-sm-2 col-md-offset-2 box0">
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
                        <span class="li_data"></span>
                        <h3>MySQL</h3>
                    </div>
                    <p>Sure et rapide</p>
                </div>

            </div>
        </div>

        <div class="col-lg-10 main-chart">
            @foreach($weatherInfo as $info)

                <div class="row mt">
                <div class="col-md-10 col-sm-8 mb col-lg-offset-2">
                    <div class="white-panel pn donut-chart">
                        <div class="white-header">
                            <h2>{{$info['city']['name']}} - {{ $info['city']['country'] }}, Temperature {{ $info['list'][0]['main']['temp'] }}°</h2>
                        </div>
                        <div class="row">
                            <p>
                                <i class="fc fc-agenda-days"></i>
                                <span class="text-uppercase text -align-center">
                                    <h3> {{ strftime("%a", strtotime(strstr($info['list'][0]['dt_txt'], ' ', true))) }}
                                                 | {{ date('H:i:s', $info['list'][0]['dt']) }} :
                                                @if($info['list'][0]['sys']['pod'] == 'd')
                                            Jour
                                        @else
                                            Nuit
                                        @endif
                                    </h3>
                                </span>
                                <h3>
                                    <b>
                                        {{ $info['list'][0]['main']['feels_like'] }}
                                    </b>
                                °   <img src="https://openweathermap.org/img/wn/{{ $info['list'][0]['weather'][0]['icon'] }}@2x.png"
                                        alt="icône du temps">
                                </h3>
                            <span>
                                                </span>
                            </p>
                            <div class="col-sm-6 col-xs-6 goleft">

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

                        <div class="row centered center-block -align-center">
                            <div class="col-sm-10 col-xs-6 goleft">
                                <p class="text-uppercase text-warning"><i class="fa fa-certificate"></i>
                                    Levée <br> {{  date('H:i:s' , $info['city']['sunrise']) }}</p>
                            </div>
                                 <div>
                                <p class="text-uppercase text-warning"><i
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
