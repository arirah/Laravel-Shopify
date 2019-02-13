@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class="text-center">Email Notification</h1>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <label>Choose Merchant</label>
                            <select id="merchant" class="form-control input-sm" name="merchant">
                                <option value="">Choose Email</option>
                                @foreach($stores as $st)
                                <option value="{{$st->name}}#{{$st->domain}}">{{$st->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Email Notification Body</label>
                            <textarea id="emailbody" rows="10" class="form-control">Dear #SHOPUSER# , 
Your app domain is #DOMAIN# </textarea>
                            <div class="clear">&nbsp;</div>
                            <button class="btn btn-primary"> Send Email </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#merchant').on('change',function(t){
            //alert(this.value); 
            var ex = this.value ;
            var nxt = ex.split('#');
             var emailtxt = $('#emailbody').val() ; 
             var temp =$('#temp').html(); 
             $('#temp').remove();
             if(temp)
             {
                $('body').append('<span id="temp">'+temp+'</span>');
            }else{
                $('body').append('<span id="temp">'+emailtxt+'</span>');           }
             
             
             var str = (temp)?temp: emailtxt; 
             var res = str.replace("#SHOPUSER#", nxt[0]).replace('#DOMAIN#',nxt[1]);
            $('#emailbody').val(res);
  });
}); 
</script>
@endsection

