@extends('layouts.app')

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
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('admin.add') }}">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Candidate</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                            <div class="col-md-12" ><input class="form-control" name="name" type="text" placeholder="Imię" required></div>
                            <div class="col-md-12" ><input class="form-control" name="surname" type="text" placeholder="Nazwisko" required></div>
                            <div class="col-md-12" ><input class="form-control" name="born" type="text" placeholder="Data urodzenia" id="datepicker" required></div>
                            <div class="col-md-12" ><input class="form-control" name="fraction" type="text" placeholder="Partia polityczna" required></div>
                            <div class="col-md-12 selectContainer">
                                <select class="form-control" name="school">
                                    <option hidden>Wybierz wykształcenie</option>
                                    <option value ="podstawowe">podstawowe</option>
                                    <option value ="zawodowe">zawodowe</option>
                                    <option value ="średnie">średnie</option>
                                    <option value ="wyższe">wyższe</option>
                                </select>
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
