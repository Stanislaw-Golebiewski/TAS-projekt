@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="panel-body">
                    @component('components.who')

                    @endcomponent
                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-primary btn-lg col-md-8 col-md-offset-4" onclick="location.href='{{ url('/debug/candidates') }}'">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Lista kandydatów</button>
                    </div>
                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-primary btn-lg col-md-8 col-md-offset-4" onclick="location.href='{{ url('/debug/voteforuser') }}'">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Zagłosuj</button>
                    </div>
                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-primary btn-lg col-md-8 col-md-offset-4" onclick="location.href='{{ url('/debug/results') }}'">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Wyniki</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
