<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\LinkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Link;

class LinkController extends Controller
{
	function __construct() 
	{
		$this->middleware('auth');	
	}

    function index () {
    	$links = Link::where('user_id', auth()->user()->id)->get();
    	return view('shorts.index', compact('links'));
    }

    function store(LinkRequest $req) {
		$shortUrl = 'jhossweb/' . Str::random(4);
    	$link = [
    		"long_url" => $req->long_url,
    		"short_url" => $shortUrl,
    		"description" => $req->description,
			"user_id" => $req->user_id
    	];
    	var_dump($link);

    	Link::create($link);

    	return redirect("/");
    }

    function searchShort ($short) {
  		
    	$link = Link::where("short_url", $short)->first();
		$link->increment('click_count');

		if(!$link) return '404';    	
        
		return redirect($link->long_url);
    }
}
