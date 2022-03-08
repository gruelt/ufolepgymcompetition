@extends('layouts.app')

@section('content')

    <b-row v-for="compet in {{json_encode($oldCompetitions)}}"  >

        <b-col >
            <b-link :href="'/old-competitions/'+compet.numCompet" >
                <b-col v-html="compet.lieuCompet" ></b-col>
            </b-link>
        </b-col>




    </b-row>



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


@endsection
