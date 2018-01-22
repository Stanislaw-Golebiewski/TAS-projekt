@extends('layouts.overview')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.col-md-12{
  padding: 5px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('admin.addVoting') }}">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Voting</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                    <div class="col-md-12" ><input class="form-control" name="name" type="text" placeholder="Nazwa głosowania" required></div>
                    <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn btn-primary btn-lg btn-block" name='submit' >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>DODAJ GŁOSOWANIE</button>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
