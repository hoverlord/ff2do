<?php

require_once('includes/lib/magpierss/rss_fetch.inc');

class FeedService {
    
    public $feed;
    
    function __construct($url){
        $this->feed = fetch_rss($url);
    }

    function display_html() {
        $output = '<h1>' . $this->feed->channel['title'] . '</h1>';
        foreach ($this->feed->items as $item) {
            $output .= '<div>';
            $output .= '<a href="' . $item['link'] . '">' . $item['title'] . '</a>';
            $output .= '<p>' . substr($item['summary'], 0, 200) . '</p>';
            $output .= '</div>';
        }
        return($output);
    }

}
?>