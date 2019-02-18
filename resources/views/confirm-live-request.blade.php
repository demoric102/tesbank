@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Live Request Confirmation Page</div>

                <div class="card-body">
                    Please confirm that you want to procure this Product. A copy will also be sent to your email address. Note that it costs N2000<br />
                    <a href="{{route('live-request')}}">Yes</a><br/>
                    <a href="{{route('front-page')}}">No</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
