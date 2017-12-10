@extends('layouts.app')

@section('content')
<style>
.sortable tr {
    cursor: pointer;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('admin.add') }}">
            <div class="panel panel-default">
                <div class="panel-heading">Lists</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Data rozpoczęcia</th>
                        <th scope="col">Data zakończenia</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="clickable" data-href="#" style="cursor: pointer;">
                          <th scope="row">1</th>
                          <td>Wybory do Sejmu</td>
                          <td>9/12/2017</td>
                          <td>10/12/2017 (koniec za 1 dzień)</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($) {
    $(".clickable").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
@endsection
