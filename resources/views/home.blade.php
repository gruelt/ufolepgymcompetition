@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <b-button block href="/old-competitions">Import Competitions</b-button>
                        <b-button block href="/competitions">Competitions</b-button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
