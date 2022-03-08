@extends('layouts.app')

@section('content')

    <b-table hover :items="{{json_encode($oldCompetitions)}}">

        <template #cell(numCompet)="row">

            <b-button  size="sm" :href="'old-competitions/'+ row.item.numCompet + '/import'">
                @{{ row.item.numCompet }} Importer
            </b-button>
        </template>

        <template #cell(old_equipes)="row">
            @{{ row.item.old_equipes.length }}
        </template>

    </b-table>





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
