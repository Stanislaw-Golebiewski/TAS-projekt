@extends('layouts.overview')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" method="POST" action="{{ route('admin.add') }}">
        <div class="panel panel-default">
          <div class="panel-heading">Wystąpił błąd podczas oddawania głosu</div>
          <div class="panel-body">
            <?php echo $errorInfo ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
