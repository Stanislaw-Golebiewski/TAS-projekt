@extends('layouts.overview')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        onSelect: function() {
          $( "#datepicker2" ).prop( "disabled", false );
          $( "#datepicker2" ).val("");
        },
        changeYear: true,
        changeMonth: true,
        dateFormat: "dd/mm/yy",
        yearRange: "<?php echo date("Y")-110; ?>:<?php echo date("Y"); ?>"
      });
    $( "#datepicker2" ).datepicker({
        onSelect: function(date) {
          $( "#datepicker2" ).prop( "disabled", false );
          var startDate = $.datepicker.parseDate('dd/mm/yy', $('#datepicker').val());
          var endDate = $.datepicker.parseDate('dd/mm/yy', $('#datepicker2').val());
          if(endDate < startDate)
          {
            $( "#datepicker2" ).val("");
            alert("Błędna data zakończenia!");
          }
        },
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
          <div class="panel-heading">Adding Vote</div>
          {{ csrf_field() }}
          <div class="panel-body">
            <div class="col-md-12 selectContainer">
              <select class="form-control" name="school">
                <option hidden>Wybierz głosowanie</option>
                <option value ="1">1</option>
                <option value ="2">2</option>
                <option value ="3">3</option>
                <option value ="4">4</option>
              </select>
            </div>
            <div class="col-md-12" ><input class="form-control" name="born" type="text" placeholder="Data rozpoczęcia" id="datepicker" required></div>
            <div class="col-md-12" ><input class="form-control" name="born" type="text" placeholder="Data zakończenia" id="datepicker2" required disabled></div>
            <div class="col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn btn-primary btn-lg btn-block" name='submit' >
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Rozpocznij</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
