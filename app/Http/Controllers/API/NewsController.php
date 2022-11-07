<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get stories from Altea
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'https://alteadigital.es/wp-json/wp/v2/posts/?categories=390&_embed&per_page=3';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);

        $json = collect($result)->map(function ($item) {
            return [
                'title' => $item->title->rendered,
                'link' => $item->link,
                'thumbnail' => $item->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url,
                'alt_text' => $item->_embedded->{'wp:featuredmedia'}[0]->alt_text
            ];
        });

        return response()->json($json);
    }
}
