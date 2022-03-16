@extends('layouts.app')

@section('content')

@include('layouts.headers.spacer')





<!-- Page content -->
<div id="app">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">



                {{$competition}}


            </div>
        </div>
    </div>
</div>

@endsection
