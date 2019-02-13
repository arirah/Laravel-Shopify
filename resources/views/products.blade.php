@extends('layouts.app')



@section('content')



<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <h4>Products ( {{\Shopify::api('products')->count()}} items found )</h4>



                

                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif



                    @if(count($all_products['products'])>0)


                    <div class="row">
                        @foreach($all_products['products'] as $k=>$pro)
                        <div class="col-md-4">
                        <div class="card pull-right" style="width: 18rem;">

                          <img class="card-img-top" src="{{isset($pro['image']['src'])?$pro['image']['src']:''}}" alt="Card image cap">

                          <div class="card-body">

                            <h5 class="card-title">{{isset($pro['title'])?$pro['title']:''}}</h5>

                            <p class="card-text">{{isset($pro['body_html'])?$pro['body_html']:''}}</p>

                            <b>Price :</b> {{isset($pro['variants'][0]['price'])?$pro['variants'][0]['price']:''}}

                            <hr>

                            <a href="product-edit?product_id={{isset($pro['id'])?$pro['id']:''}}" class="btn btn-primary">Edit</a>

                            <a href="product-delete?product_id={{isset($pro['id'])?$pro['id']:''}}" class="btn btn-primary">Delete</a>

                          </div>

                        </div>
                    </div>
                            

                        @endforeach
</div>


                    @endif



                    

              

            </div>

        </div>

    </div>

</div>

@endsection

