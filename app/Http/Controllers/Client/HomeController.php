<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        // $client = new Client();
        // $req = $client->get("http://winds.hopto.org:3000/schedule/getWarrantyByCode?text=QH000171");
        // $response = json_decode($req->getBody()->getContents(), true);
        // $data= $response['data'];
        // dd($data);
        return view('client.index');
    }

}