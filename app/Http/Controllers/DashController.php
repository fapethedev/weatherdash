<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DashController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function goToDapaong(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('city.dapaong', ['weatherInfo' => ProjectController::fetchDapoangWeatherData()]);
    }

    /**
     * @throws GuzzleException
     */
    public function goToKara(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('city.kara', ['weatherInfo' => ProjectController::fetchKaraWeatherData()]);

    }

    /**
     * @throws GuzzleException
     */
    public function goToLome(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('city.lome', ['weatherInfo' => ProjectController::fetchLomeWeatherData()]);
    }
}
