<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\LinkRequest;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    function index () {
    	$links = Link::all();
    	return view('shorts.index', compact('links'));
    }

    function store(LinkRequest $req) {
    	
    	$shortUrl = 'jhossweb/' . Str::random(4);
    	$link = [
    		"long_url" => $req->long_url,
    		"short_url" => $shortUrl,
    		"description" => $req->description
    	];

    	Link::create($link);

    	return redirect("/");
    }

    function searchShort ($short) {
  		var_dump($short);
    	$link = Link::where("short_url", $short)->first();
		
		if(!$link) return '404';    	

		return redirect($link->long_url);
    }
}
