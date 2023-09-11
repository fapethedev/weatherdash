<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function fetchWeatherData(): array
    {
        $client = new Client();

        $urls = [
            'https://api.openweathermap.org/data/2.5/forecast?lat=10.8595454&lon=0.2043122&units=metric&lang=fr&appid=0dc5cc8565cac685b90fee81853f1d43',
            'https://api.openweathermap.org/data/2.5/forecast?lat=9.5488754&lon=1.1977453&units=metric&lang=fr&appid=0dc5cc8565cac685b90fee81853f1d43',
            'https://api.openweathermap.org/data/2.5/forecast?lat=6.130419&lon=1.215829&units=metric&lang=fr&appid=0dc5cc8565cac685b90fee81853f1d43',
        ];

        $results = array();

        foreach ($urls as $url){
            $response = $client -> request('GET', $url, [
                'verify'  => false,
            ]);
            $responseBody = json_decode($response -> getBody(), true);
            $results[] = $responseBody;
        }

        return $results;
    }

    /**
     * @throws GuzzleException
     */
    public static function fetchDapoangWeatherData(): array
    {
        $client = new Client();

          $url = 'https://api.openweathermap.org/data/2.5/forecast?lat=10.8595454&lon=0.2043122&units=metric&lang=fr&appid=0dc5cc8565cac685b90fee81853f1d43';

        $results = array();

        $response = $client->request('GET', $url, [
            'verify' => false,]);
        $responseBody = json_decode($response->getBody(), true);
        $results[] = $responseBody;

        return $results;
    }

    /**
     * @throws GuzzleException
     */
    public static function fetchKaraWeatherData(): array
    {
        $client = new Client();

        $url = 'https://api.openweathermap.org/data/2.5/forecast?lat=9.5488754&lon=1.1977453&units=metric&lang=fr&appid=0dc5cc8565cac685b90fee81853f1d43';

        $results = array();

        $response = $client->request('GET', $url, [
            'verify' => false,]);
        $responseBody = json_decode($response->getBody(), true);
        $results[] = $responseBody;

        return $results;
    }

    /**
     * @throws GuzzleException
     */
    public static function fetchLomeWeatherData(): array
    {
        $client = new Client();

        $url = 'https://api.openweathermap.org/data/2.5/forecast?lat=6.130419&lon=1.215829&units=metric&lang=fr&appid=0dc5cc8565cac685b90fee81853f1d43';

        $results = array();

        $response = $client->request('GET', $url, [
            'verify' => false,]);
        $responseBody = json_decode($response->getBody(), true);
        $results[] = $responseBody;

        return $results;
    }

    /**
     * @throws GuzzleException
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard', ['weatherInfo' => $this -> fetchWeatherData()]);
    }
}
