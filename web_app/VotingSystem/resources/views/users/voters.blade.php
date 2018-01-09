@extends('layouts.overview')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: "dd/mm/yy",
        yearRange: "<?php echo date("Y")-110; ?>:<?php echo date("Y"); ?>"
      });
  } );
</script>
<style>
.col-md-12{
  padding: 5px;
}
</style>
<div class="container">
  <div class="row">
    <form class="form-horizontal" method="POST" action="{{ route('admin.store') }}">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Adding Voter</div>
            {{ csrf_field() }}
            <div class="panel-body">
              <div class="col-md-12" ><input class="form-control" name="name" type="text" placeholder="Imię" required></div>
              <div class="col-md-12" ><input class="form-control" name="surname" type="text" placeholder="Nazwisko" required></div>
              <div class="col-md-12" ><input class="form-control" name="email" type="text" placeholder="Adres email" required></div>
              <div class="col-md-12" ><input class="form-control" name="born" type="text" placeholder="Data urodzenia" id="datepicker" required></div>
              <div class="col-md-12" ><input class="form-control" name="passport" type="text" placeholder="Seria dowodu osobistego" required></div>
              <div class="panel-body">
                <div class="col-md-1" style="margin-top: 5px;"><span class="glyphicon glyphicon-lock"></span></div>
                <div class="col-md-11">
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Hasło" required>

                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Powtórz hasło" required>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-md-offset-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name='submit' >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>DODAJ GŁOSUJĄCEGO</button>
              </div>
            </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
