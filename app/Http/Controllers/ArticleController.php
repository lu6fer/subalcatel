<?php namespace Subalcatel\Http\Controllers;

use Subalcatel\Http\Requests;
use Subalcatel\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Subalcatel\Article;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $article = Article::all();
		return response()->json($article);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        if(empty($article)) {
            return response()->json();
        }
        $article->load('comments');
        return response()->json($article);
    }

    /**
     * Display comments for article slug
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function comments($slug)
    {
        $article = Article::findBySlug($slug);
        if(empty($article)) {
            return response()->json();
        }
        return response()->json($article->comments);
    }

    /**
     * Display user for article slug
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function user($slug)
    {
        $article = Article::findBySlug($slug);
        if(empty($article)) {
            return response()->json();
        }
        return response()->json($article->user);
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
