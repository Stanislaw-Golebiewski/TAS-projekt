@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @component('components.who')

                    @endcomponent
                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-primary btn-lg col-md-8 col-md-offset-4" onclick="location.href='{{ url('/admin/addvoter') }}'">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Dodaj głosującego</button>
                    </div>

                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-primary btn-lg col-md-8 col-md-offset-4" onclick="location.href='{{ url('/admin/addcandidate') }}'">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>  Dodaj kandydata</button>
                    </div>

                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-primary btn-lg col-md-8 col-md-offset-4" onclick="location.href='{{ url('/admin/addcandidatesto') }}'">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>  Dodaj kandydatów do głosowania</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
