<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ivanvgladkov\Geocoding\Geocoding;

/**
 * Class GeoController
 * @package App\Http\Controllers
 */
class GeoController extends Controller
{

    public function search(Request $request, Geocoding $geocoding)
    {
        $geoResponse = null;
        $errors = [];

        if ($request->isMethod('post')) {
            $geoRequest = $geocoding
                ->getRequest()
                ->setLanguage($request->input('lang'))
                ->setAddress($request->input('address'))
                ->setLatitude($request->input('latitude'))
                ->setLongitude($request->input('longitude'))
                ->setPlaceId($request->input('placeId'))
            ;

            try {
                $geoResponse = $geocoding->send($geoRequest);
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        return view('geo.search', ['geoResponse' => $geoResponse, 'errors' => $errors]);
    }
}