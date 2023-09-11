<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{
    public static function degreVersDirection(int $degre): string
    {
        if ($degre >= 337.5 || $degre < 22.5)
        {
            return "Nord";
        }
        else if ($degre >= 22.5 && $degre < 67.5)
        {
            return "N-E";
        }
        else if ($degre >= 67.5 && $degre < 112.5)
        {
            return "Est";
        }
        else if ($degre >= 112.5 && $degre < 157.5)
        {
            return "S-E";
        }
        else if ($degre >= 157.5 && $degre < 202.5)
        {
            return "Sud";
        }
        else if ($degre >= 202.5 && $degre < 247.5)
        {
            return "S-O";
        }
        else if ($degre >= 247.5 && $degre < 292.5)
        {
            return "Ouest";
        }
        else
        {
            return "N-O";
        }
    }
}
