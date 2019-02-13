@extends('layouts.app')



@section('content')



<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <h4>{{isset($product['product']['title'])?$product['product']['title']:''}}  </h4>



                

                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif



                    @if(isset($product['product']))



                        

                        <div class="card pull-right" style="width: 18rem;">

                          <img class="card-img-top" src="{{isset($pro['image']['src'])?$pro['image']['src']:''}}" alt="Card image cap">

                          <div class="card-body">

                            <h5 class="card-title">{{isset($product['product']['title'])?$product['product']['title']:''}}</h5>

                            <p class="card-text">{{isset($product['product']['html_body'])?$product['product']['html_body']:''}}</p>

                            <b>Price :</b> {{isset($product['product']['variants'][0]['price'])?$product['product']['variants'][0]['price']:''}}

                            <hr>

                            <a href="product-edit?product_id={{isset($pro['id'])?$pro['id']:''}}" class="btn btn-primary">Edit</a>

                            <a href="product-delete?product_id={{isset($pro['id'])?$pro['id']:''}}" class="btn btn-primary">Delete</a>

                          </div>

                        </div>

                            

                        



                    @endif



                    

              

            </div>

        </div>

    </div>

</div>

@endsection

