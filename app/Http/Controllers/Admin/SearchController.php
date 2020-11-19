<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Helper;
// use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search()
    {
        $body = [
            'WarrantyCode' => request()->WarrantyCode
        ];
        $input = json_encode($body);
        $client = new Client();
        $url = 'http://winds.hopto.org:3000/schedule/getWarrantyByCode';
        $headers = array('Content-Type: application/json');
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
        ]);
        $req = $client->post(
            $url,
            ['body' => $input]
        );
        $response = json_decode($req->getBody()->getContents(), true);
        $data = $response['data'];
        dd($data);
        return view('client.index', compact('data'));
    }
  
}
