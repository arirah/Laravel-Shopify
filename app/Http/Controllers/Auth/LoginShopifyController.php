<?php

namespace App\Http\Controllers\Auth;

//use Socialite;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use App\UserProvider;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;

class LoginShopifyController extends Controller
{

    /**

     * Redirect the user to the GitHub authentication page.

     *

     * @return \Illuminate\Http\Response

     */

    public function redirectToProvider(Request $request)
    {

        $this->validate($request, [

            'domain' => 'string|required',

        ]);

        $config = new \SocialiteProviders\Manager\Config(

            env('SHOPIFY_KEY'),

            env('SHOPIFY_SECRET'),

            env('SHOPIFY_REDIRECT'),

            ['subdomain' => $request->get('domain')]

        );

        return Socialite::with('shopify')

            ->setConfig($config)

            ->scopes(['read_products', 'write_products'])

            ->redirect();

    }

    /**

     * Obtain the user information from GitHub.

     *

     * @return \Illuminate\Http\Response

     */

    public function handleProviderCallback()
    {

        $shopifyUser = Socialite::driver('shopify')->user();

        // Create user

        $user = User::firstOrCreate([

            'name'     => $shopifyUser->name,

            'email'    => $shopifyUser->email,

            'password' => '',

        ]);

        // Store the OAuth Identity

        UserProvider::firstOrCreate([

            'user_id'          => $user->id,

            'provider'         => 'shopify',

            'provider_user_id' => $shopifyUser->id,

            'provider_token'   => $shopifyUser->token,

        ]);

        Session::put('token', $shopifyUser->token);
        Session::put('domain', $shopifyUser->nickname);

        // print_r($shopifyUser->nickname) ;exit  ;

        // Create shop

        $shop = Store::firstOrCreate([

            'name'   => $shopifyUser->name,

            'domain' => $shopifyUser->nickname,

        ]);

        // Attach shop to user

        $shop->users()->syncWithoutDetaching([$user->id]);

        // Login with Laravel's Authentication system

        Auth::login($user, true);

        return redirect('/home');

    }

}
