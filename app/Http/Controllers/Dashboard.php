<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Rssfeed;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
	/** Dashboard index
	*	Display feeds that user has stored.
	*  	The parsing is done in model, but feed attribute must be used for that to work,
    *		so can be a comment.
    *  	@TODO: check url is still valid and rss feed is still valid when reading.
	*/
    public function index()
    {
    	$feeds = Rssfeed::where('user_id', Auth::id())->orderby('id', 'desc')->paginate(5);
        return view('dashboard', ["feeds" => $feeds]);
    }

    /* Add Feed page
    */
    public function add() {
    	return view('add-feed');
    }

    /* Add Feed functionality
    * 	Mainly checking if feed is valid rss 2.0 feed
    * 		which we can do with xpath and also check URL exists.
    * 	Use a try catch block to get this info in case something goes wrong.
    * 
    *	@TODO: Some of the checking here should be done when reading feed 
    * 		as well in case it has changed. Perhaps move to model.
    */
    public function addFeed(Request $request) {
    	$error = false;
    	if($request->url) {
    		$this->validate(request(), [
            	'url' => 'required|url'
        	]);
    		//check it doesn't exist already.
    		$feedRecord = Rssfeed::where('user_id', Auth::id())->where('feed', '=', $request->url)->first();
    		if (!$feedRecord) {
    			try {
    				$response = Http::get($request->url);
    				if ($response->successful()) {
    					$feed = simplexml_load_file($request->url);
    					//check it is valid rss 2.0
    					// can support other feed types later.
    					if(isset($feed->xpath('//rss/@version')[0]) &&
    						strval($feed->xpath('//rss/@version')[0]) === "2.0") {
    						//insert the feed and redirect to dashboard
    						$rssFeed = new Rssfeed();
    						$rssFeed->user_id = Auth::id();
    						$rssFeed->feed = $request->url;
    						$rssFeed->feed_type = 'rss2.0';
    						$rssFeed->save();
    						return redirect()->to('/dashboard');
    					} else {
    						$error = true;
    					}
    				} else {
    					$error = true;
    				} 
    			} catch (Exception $e) {
    				$error = true; 
    			}
    		} else {
    			$error = true;
    		}
    		
    	}

    	return view('dashboard', ["add" => true, "error" => $error]);
    }

    /* Read single feed
    *  	The parsing is done in model, but feed attribute must be used for that to work,
    *		so can be a comment.
    *  	@TODO: check url is still valid and rss feed is still valid when reading.
    */
    public function readFeed($feedId)
    {
    	$feedRecord = Rssfeed::where('user_id', Auth::id())->where('id', '=', $feedId)->first();
    	if($feedRecord) {
    		return view('read-feed', ["feed" => $feedRecord]);
    	} else {
    		return redirect()->to('/dashboard');
    	}
    }

    /**
    *	Delete a single feed from a user.
    */
    public function deleteFeed($feedId)
    {
    	Rssfeed::where('user_id', Auth::id())->where('id', '=', $feedId)->limit(1)->delete();
    	return redirect()->to('/dashboard');
    }
}