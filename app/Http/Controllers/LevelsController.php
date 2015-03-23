<?php namespace Subalcatel\Http\Controllers;

use Subalcatel\Http\Requests;
use Subalcatel\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Subalcatel\DiveLabel;
use Subalcatel\NitroxLabel;
use Subalcatel\MonitorLabel;
use Subalcatel\BoatLabel;

class LevelsController extends Controller {

	/**
	 * Display all levels
	 *
	 * @return Response
	 */
	public function index()
	{
        $dive = DiveLabel::all();
        $nitrox = NitroxLabel::all();
        $monitor = MonitorLabel::all();
        $boat = BoatLabel::all();

        return response()->json(array(
            'dive' => $dive,
            'nitrox' => $nitrox,
            'monitor' => $monitor,
            'boat' => $boat
        ));
	}

    /**
     * Display all boat levels
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function boat()
    {
        return response()->json(BoatLabel::all());
    }

    /**
     * Display all dive levels
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dive()
    {
        return response()->json(DiveLabel::all());
    }

    /**
     * Display all nitrox levels
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function nitrox()
    {
        return response()->json(NitroxLabel::all());
    }

    /**
     * Display all monitor levels
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function monitor()
    {
        return response()->json(MonitorLabel::all());
    }
}
