<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class httpRequestController extends Controller
{
    public function show()
    {

        $client = new Client();
        $url = 'https://jsonplaceholder.typicode.com/posts';

        try {
            $response = $client->request('GET', $url);
            $body = $response->getBody();
            $data = json_decode($body, true);
            foreach ($data as $item){
                print_r($item['title']);
                print_r('<br>');
            }

        } catch (\Exception $e) {
            echo 'خطا: ' . $e->getMessage();
        }

    }
}
