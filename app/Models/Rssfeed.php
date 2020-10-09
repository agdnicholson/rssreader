<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rssfeed extends Model
{
    /**
     * Parse the feed based on the url
     *
     * @param  string $value
     * @return void
     */
    public function getFeedAttribute($value)
    {
    	/* Do the heavy lifting of the feed parsing here.
    	*	We can extend this in future to allow for more feed types, so
    	*		use a switch statement. Currently only supporting RSS 2.0
    	*		so we can use simplexml to parse these in the default case.
    	*/
    	switch($this->feed_type) {
    		default:
		    	$feed = simplexml_load_file($value);
				$this->url = $value;
				$this->title = strval($feed->channel->title);
				$this->description = strip_tags(strval($feed->channel->description));
				$this->image = $feed->channel->image->url ? strval($feed->channel->image->url) : '';
				$items = [];

				foreach($feed->channel->item as $item) {
					$newItem = [];
					$newItem["date"] = strval($item->pubDate);
					$newItem["description"] = strip_tags(strval($item->description));
					$newItem["link"] = strval($item->link);
					$newItem["title"] = strval($item->title);
					array_push($items, $newItem);
				}
				$this->items = $items;
		}
    }
}