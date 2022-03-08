@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Compétitions Saisies sur UfolepGym') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table>
                    @foreach($oldCompetitions as $compet)
                        <tr>

                            <td>{{$compet->numCompet}}</td>
                            <td>{{$compet->lieuCompet}}</td>
                            <td>{{$compet->typeCompet}}</td>
                            <td>{{$compet->depCompet}}</td>
                            <td>{{$compet->dateCompet}}</td>
                            <td>{{$compet->dateCompet}}</td>
                            <td>{{$compet->oldEquipes->count()}}</td>
                        </tr>
                        @endforeach
                    </table>

                        {{$oldCompetitions}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
