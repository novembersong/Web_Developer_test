<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    public function index(Request $request){
        $filter = $request->filter;
        $page = $request->page;

        if ($filter != null){
            $client = new Client();

            $params = [
                'query' => [
                    'apikey' => 'faf7e5bb',
                    's' => $filter,
                    'type' => '',
                    'y' => '',
                    'r' => 'json',
                    'page' => $page,
                    'callback' => '',
                    'v' => '1'
                ]
            ];

            $response = $client->request('GET', 'http://www.omdbapi.com/',$params);
//dd($response->getBody()->getContents());
            $response = json_decode($response->getBody()->getContents());
//dd($response->Search);
        }else{
            $response = null;
            $filter = '';
            $page = '';
        }



        return view('movieList.index',compact('response','filter','page'));
    }

    public function detailMovie($id){
        $client = new Client();

        $params = [
            'query' => [
                'apikey' => 'faf7e5bb',
                'i' => '',
                't' => $id,
                'type' => '',
                'y' => '',
                'plot' => 'full',
                'r' => 'json',
                'callback' => '',
                'v' => '1'
            ]
        ];

        $response = $client->request('GET', 'http://www.omdbapi.com/',$params);
//dd($response->getBody()->getContents());
        $response = json_decode($response->getBody()->getContents());
//dd($response->Search);

        return view('movieList.detail',compact('response'));
    }
}
