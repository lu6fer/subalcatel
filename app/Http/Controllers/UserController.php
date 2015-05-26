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
        $user = User::where('active', '=', '1')->paginate(10);
		return response()->json($user);
	}

    /**
     * Display specified user with address information
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('address');
        return response()->json($user);
    }

    /**
     * Display specified user with dive, monitor, nitrox, boat and tiv levels.
     *
     * @param  int  $id
     * @return Response
     */
    public function levels($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
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
    public function adhesion($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('adhesion', 'adhesion.insurance', 'adhesion.origin');

        return response()->json($user);
    }

    /**
     * Display specified user with certificate information
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function certificate($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('certificate');

        return response()->json($user);
    }

    /**
     * Display specified user's articles, with comments and commenter
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function articles($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('articles', 'articles.comments', 'articles.comments.user');

        return response()->json($user);
    }

    /**
     * Display specified user's comments, with articles and writer
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function comments($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('comments', 'comments.article', 'comments.article.user');

        return response()->json($user);
    }

    /**
     * Display speficied user already enrolled dive
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function diver($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('dives', 'dives.owner');

        return response()->json($user);
    }

    /**
     * Display specified user owning dives
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function diveOwner($slug)
    {
        $user = User::findBySlug($slug);
        if(empty($user)) {
            return response()->json();
        }
        $user->load('diveOwner', 'diveOwner.users');

        return $user;
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
