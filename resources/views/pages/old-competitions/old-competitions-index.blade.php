@extends('layouts.app')

@section('content')

    @include('layouts.headers.spacer')





    <!-- Page content -->
    <div id="app">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">





                <old-competition-table :data="{{json_encode($oldCompetitions)}}"></competition-table>
















                    <table>
                    @foreach($oldCompetitions as $compet)
                        <tr>

                            <td>{{$compet->numCompet}}</td>
                            <td>{{$compet->lieuCompet}}</td>
                            <td>{{$compet->typeCompet}}</td>
                            <td>{{$compet->depCompet}}</td>
                            <td>{{$compet->dateCompet}}</td>

                            <td>{{$compet->oldEquipes->count()}}</td>
                        </tr>
                        @endforeach
                    </table>

            </div>
        </div>
    </div>
    </div>

@endsection
