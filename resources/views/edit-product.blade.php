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
                            <form action="product-update" method="POST">
                               {{ csrf_field() }}
                          <img class="card-img-top" src="{{isset($product['product']['image']['src'])?$product['product']['image']['src']:''}}" alt="Card image cap">

                          <div class="card-body">

                            <h5 class="card-title"><input type="text" class="form-control input-sm" value="{{isset($product['product']['title'])?$product['product']['title']:''}}" name="title"> </h5>

                            <b>Details</b>
                            <textarea class="form-control" rows="3" name="body_html">{{isset($product['product']['body_html'])?$product['product']['body_html']:''}}</textarea>
 

                            <b>Price :</b> <input type="text" class="form-control input-sm" value="{{isset($product['product']['variants'][0]['price'])?$product['product']['variants'][0]['price']:''}}" name="price"> 

                            <hr>
                            <input type="hidden" value="{{Input::get('product_id')}}" name="product_id">
                            <button class="btn btn-info btn-block" type="submit">Update</button> 
                        </div>
                          </div>

                        </div> 

                    @endif 
              

            </div>

        </div>

    </div>

</div>

@endsection

