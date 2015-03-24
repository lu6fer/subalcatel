<?php namespace Subalcatel\Http\Controllers;

use Subalcatel\Http\Requests;
use Subalcatel\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Subalcatel\Adhesion;
use Subalcatel\InsuranceLabel;
use Subalcatel\OriginLabel;

class AdhesionController extends Controller
{
    /*
     * Display insurance list
     */
    public function insurance()
    {
        return response()->json(InsuranceLabel::all());
    }

    /*
     * Display origin list
     */
    public function origin()
    {
        return response()->json(OriginLabel::all());
    }
}
