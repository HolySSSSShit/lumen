<?php

namespace App\Http\Controllers;
use \App\Http\Controllers\Controller as AHCController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends AHCController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index($id)
    {
        $requestId = $this->request->cookie('user');
        if ($requestId !== base64_encode($id)) {
            return new Response('has not login', Response::HTTP_NOT_ACCEPTABLE);
        }
        $rep = json_encode(['user' => $id]);
        $response = new Response($rep, 200);
        // $response->withCookie('user', md5($id), 3600, '/', 'lumen.com');
        return $response;
    }

}