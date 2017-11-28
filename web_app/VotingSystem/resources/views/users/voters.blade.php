@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <form class="form-horizontal" method="POST" action="{{ route('admin.store') }}">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Voter</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">IMIĘ </div>
              
                            <div class="col-md-6" ><input class="form-control" name="name" type="text" required></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">NAZWISKO </div>
              
                            <div class="col-md-6" ><input class="form-control" name="surname" type="text" required></div>
                    </div>

                     <div class="row">
                            <div class="col-md-2 col-md-offset-1">EMAIL </div>
              
                            <div class="col-md-6" ><input class="form-control" name="email" type="text" required></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">ROK URODZENIA </div>
              
                            <div class="col-md-6" ><input class="form-control" name="born" type="text" required></div>
                    </div>
                    <div class="row">
                            <div class="col-md-2 col-md-offset-1">SERIA DOWODU </div>
              
                            <div class="col-md-6" ><input class="form-control" name="passport" type="text" required></div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-2 col-md-offset-1">HASŁO </div>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-1">POWTÓRZ HASŁO </div>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    <div class="col-md-5 col-md-offset-3">
                          <button type="submit" class="btn btn-primary btn-lg btn-block" name='submit' >
                           <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>DODAJ GŁOSUJĄCEGO</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection