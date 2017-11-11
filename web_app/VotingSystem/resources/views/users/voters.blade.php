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
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">IMIĘ </div>
              
                            <div class="col-md-6" ><input class="form-control" name="name" type="text"></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">NAZWISKO </div>
              
                            <div class="col-md-6" ><input class="form-control" name="surname" type="text"></div>
                    </div>

                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">DATA URODZENIA </div>
              
                            <div class="col-md-6" ><input class="form-control" name="date" type="text"></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">SERIA DOWODU </div>
              
                            <div class="col-md-6" ><input class="form-control" name="serialnumber" type="text"></div>
                    </div>
                    <div class="col-md-5 col-md-offset-3">
                          <button type="submit" class="btn btn-primary btn-lg btn-block" name='submit' >
                           <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>DODAJ ZADANIE</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection