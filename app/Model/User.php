<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model as IDEModel;
use Illuminate\Support\Facades\DB;

class User extends IDEModel
{

    public static function make()
    {
        return new static();
    }

    public function getOne($cond)
    {
        $resp = DB::table('users')->where($cond)->take(1)->get();
        foreach ($resp as $res) {
            $res = (array) $res;
        }
        return $res;
    }

    public function addOne($data)
    {
        $id = DB::table('users')->insertGetId($data);
        return $id;
    }
}