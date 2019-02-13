@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <h1 class="text-center">Current Merchants Installed VTX APPs</h1> 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-sm table-bordered">
                        <tr> 
                            <th> Merchant Name </th>
                            <th> Shop Address  </th>
                            <th> Installed Date  </th>
                            <th class="text-center"> Action  </th>
                        </tr>
                        @foreach($stores as $st)
                        <tr> 
                            <td> {{$st->name}} </td>
                            <td> {{$st->domain}} </td>
                            <td> {{$st->created_at}} </td>
                            <td class="text-center"> <a class="btn btn-sm btn-primary" href="https://{{$st->domain}}"> Visit Store </a> </td>
                        </tr>
                        @endforeach
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

