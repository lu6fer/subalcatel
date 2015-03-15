<?php namespace Subalcatel\Http\Controllers;

use Subalcatel\Http\Requests;
use Subalcatel\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Subalcatel\User;

/**
 * Class UserController
 * @package Subalcatel\Http\Controllers:q
 */
class UserController extends Controller {

	/**
	 * Display all users
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(User::all());
	}

    /**
     * Display specified user with address information
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($slug)
    {
        $user = User::findBySlug($slug);
        $user->load('address');
        return response()->json($user);
    }

    /**
     * Display specified user with dive, monitor, nitrox, boat and tiv levels.
     *
     * @param  int  $id
     * @return Response
     */
    public function levels($id)
    {
        $user = User::find($id);
        $user->load('diveLevels',    'diveLevels.diveLabel',
            'nitroxLevels',  'nitroxLevels.nitroxLabel',
            'monitorLevels', 'monitorLevels.monitorLabel',
            'boatLicences',  'boatLicences.boatLabel',
            'tivLicence'
        );

        return response()->json($user);
    }

    /**
     * Display specified user with adhesion information
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function adhesion($id)
    {
        $user = User::find($id);
        $user->load('adhesion', 'adhesion.insurance', 'adhesion.origin');

        return response()->json($user);
    }

    /**
     * Display specified user with certificate information
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function certificate($id)
    {
        $user = User::find($id);
        $user->load('certificate');

        return response()->json($user);
    }

    /**
     * Display specified user's articles, with comments and commenter
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function articles($id)
    {
        $user = User::find($id);
        $user->load('articles', 'articles.comments', 'articles.comments.user');

        return response()->json($user);
    }

    /**
     * Display specified user's comments, with articles and writer
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function comments($id)
    {
        $user = User::find($id);
        $user->load('comments', 'comments.article', 'comments.article.user');

        return response()->json($user);
    }

    /**
     * Display speficied user already enrolled dive
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function diver($id)
    {
        $user = User::find($id);
        $user->load('dives', 'dives.owner');

        return response()->json($user);
    }

    /**
     * Display specified user owning dives
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function diveOwner($id)
    {
        $user = User::find($id);
        $user->load('diveOwner', 'diveOwner.users');

        return $user;
    }















    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
