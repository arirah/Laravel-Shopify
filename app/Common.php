<?php

namespace App;

use App\User;
use App\UserProvider;
use Illuminate\Database\Eloquent\Model; 

class Common extends Model
{

    public static function getStoreName($user_id)
    {

        return User::join('store_users as su', 'su.user_id', '=', 'users.id')
        ->join('stores', 'stores.id', '=', 'su.store_id')->where('users.id',$user_id)->first();

    }

    public static function getToken($user_id)
    {

        return UserProvider::where('user_id',$user_id)->orderBy('id','desc')->first();

    }

}
