<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller as AHCController;
use Illuminate\Http\Request;
use \App\Model\User as AMUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class AccountController extends  AHCController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function login($userName, $userPwd)
    {
        $nickName = $this->request->get('nick_name', 'default_nick_name');
        $mailAddr = $this->request->get('mail_addr', 'default@mail.com');
        $userInfo = AMUser::make()->getOne(['user_name' => $userName]);
        if (empty($userInfo)) {
            $insertData = [
                'user_name' => $userName,
                'user_pwd' => md5(md5($userPwd)),
                'nick_name' => $nickName,
                'mail_address' => $mailAddr,
            ];
            $id = AMUser::make()->addOne($insertData);
        } else {
            $id = $userInfo['id'];
        }
        $resp = json_encode([
            'user_name' => $userName,
        ]);
        $response = new Response($resp, 200);
        $response->withCookie('user', base64_encode($id), 3600, '/', 'lumen.com');
        return $response;
    }

}