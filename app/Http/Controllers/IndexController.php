<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Main Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles general requests that are not reflected in other
    | controllers.
    |
    */

    /**
     * Show the main template view and make all
     * appropriate/needed settings.
     *
     * @return html-source
     */
    public function index()
    {
        $imagesArray = glob(config('media.imagesPath').'*.*');
        if (count($imagesArray) > 0) {
            foreach ($imagesArray as $key => $image) {
                $imagesArray[$key] = substr($image, strlen(config('media.imagesPath')));
            }
        }

        return view('index', [
            'imagesArray' => $imagesArray
        ]);
    }
}