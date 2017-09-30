<?php

namespace App\Http\Controllers;
use \App\Http\Controllers\Controller as AHCController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MockController extends AHCController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index($id)
    {
        $list = [
            0 => json_encode(array('user' => 'agc')),
            1 => json_encode(array('user' => 'dki')),
        ];

        $rep = !empty($list) && isset($list[$id]) ? $list[$id] : 'invalid mock_id or list is empty';
        $response = new Response($rep, 200);
        // $response->withCookie('user', md5($id), 3600, '/', 'lumen.com');
        return $response;
    }

}