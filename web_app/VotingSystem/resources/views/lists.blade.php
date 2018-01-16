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
                      @foreach ($lists as $list)
                      <tr class="clickable" data-href="voteforuserinvoting/<?php echo $list->id ?>" style="cursor: pointer;">
                          <th scope="row"><?php echo $list->id ?></th>
                          <td><?php echo $list->name ?></td>
                          <td><?php echo ($list->startDate != "" ? $list->startDate : "Brak"); ?></td>
                          <td><?php echo ($list->endDate != "" ? $list->endDate : "Brak"); ?></td>
                      </tr>
                      @endforeach
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
