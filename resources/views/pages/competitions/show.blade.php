@extends('layouts.app')

@section('content')

@include('layouts.headers.spacer')
{{--@include('layouts.headers.cards')--}}




<!-- Page content -->
<div id="app">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">

                <competition
                    :competition="{{json_encode($competition)}}"
                   :agres = "{{json_encode($agres)}}"
                ></competition>



{{--                {{$competition}}--}}
                {{json_encode($agres)}}


            </div>
        </div>
    </div>
</div>

@endsection
