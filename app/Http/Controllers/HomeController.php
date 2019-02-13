<?php

namespace App\Http\Controllers;

use App\Common;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Shopify;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $token;
    private $donain;
    public function __construct()
    {
        //$this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->getShopify();
            return $next($request);
        });

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getShopify()
    {
        // Shopify::init(env('SHOPIFY_DOMAIN'), Session::get('token'));
        $user_data    = Common::getStoreName($this->user->id);
        $get_domain   = isset($user_data->domain) ? $user_data->domain : '';
        $get_token    = Common::getToken($this->user->id);
        $this->domain = $get_domain;
        $this->token  = $get_token->provider_token;

        //print_r($get_token);

        putenv("SHOPIFY_DOMAIN=$this->domain");
        putenv("SHOPIFY_TOKEN=$this->token");

    }
    public function index()
    {

        return view('home');
    }

    public function products()
    {

        $all_products = Shopify::api('products')->all();
        //print_r($all_products);
        return view('products')->with('all_products', $all_products);
    }

    public function customers()
    {
        
        return view('customers');
    }

    public function notify()
    {
        //$all_products = Shopify::api('products')->all();
        //print_r($all_products) ;
        return view('notify');
    }

    public function productDelete(Request $r)
    {
        $product = Shopify::getProduct($r->product_id);
        //$product->setTitle('Burton Freestyle 152');
        $product->remove();
        //echo $r->product_id;
        return redirect('products');
        // return view('notify');
    }
    public function productUpdate(Request $r)
    {
        $product = Shopify::api('products')->show($product_id = $r->product_id);
        //$product= $this->getShopify()->api('products')->show($product_id = $r->product_id);

        return view('edit-product')->with('product', $product);
    }
    public function productUpdatePost(Request $r)
    {
        //print_r($r->all());
        $product = Shopify::getProduct($r->product_id);
        $product->setTitle($r->title);
        $product->setBodyHtml($r->body_html);
        $product->save();
        return redirect('products');

    }
}
