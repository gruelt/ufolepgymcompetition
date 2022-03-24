@extends('layouts.app')

@section('content')

    @include('layouts.headers.spacer')
    {{--@include('layouts.headers.cards')--}}






    <!-- Page content -->
    <div id="app">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">

                    <agres-competition-equipe
                        :competition="{{json_encode($competition)}}"
                        :agres = "{{json_encode($agres)}}"
                        :equipe = "{{json_encode($equipe)}}"
                        :juges = "{{json_encode($juges)}}"
                    ></agres-competition-equipe>


                </div>
            </div>
        </div>
    </div>

@endsection
