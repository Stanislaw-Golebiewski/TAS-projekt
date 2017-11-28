@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('admin.add') }}">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Candidate</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">IMIĘ </div>
    
                            <div class="col-md-4" ><input class="form-control" name="name" type="text"></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">NAZWISKO </div>
              
                            <div class="col-md-4" ><input class="form-control" name="surname" type="text"></div>
                    </div>

                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">ROK URODZENIA </div>
              
                            <div class="col-md-4" ><input class="form-control" name="born" type="text"></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">PARTIA POLITYCZNA </div>
              
                            <div class="col-md-4" ><input class="form-control" name="fraction" type="text"></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">WYKSZTAŁCENIE </div>
                                <div class="col-xs-2 selectContainer">
                                    <select class="form-control" name="school">
                                        <option value =""></option>
                                        <option value ="podstawowe">podstawowe</option>
                                        <option value ="zawodowe">zawodowe</option>
                                        <option value ="średnie">średnie</option>
                                        <option value ="wyższe">wyższe</option>
                                    </select>
                                </div>
                    </div>
                    <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn btn-primary btn-lg btn-block" name='submit' >
                           <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>DODAJ KANDYDATA</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection