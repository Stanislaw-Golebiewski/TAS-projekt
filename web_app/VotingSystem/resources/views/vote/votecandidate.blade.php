@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('voting.vote') }}">
            <div class="panel panel-default">
                <div class="panel-heading">Lista kandydatów</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Rok urodzenie</th>
                        <th scope="col">Wyszktałcenie</th>
                        <th scope="col">Partia</th>
                        <th scope="col">Numer na liście</th>
                        <th scope="col">Wybierz osobę</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($candidates as $candidate)
                      <tr>
                        <td><?php echo $candidate->id ?></td>
                        <td><?php echo $candidate->name ?></td>
                        <td><?php echo $candidate->surname ?></td>
                        <td><?php echo $candidate->born ?></td>
                        <td><?php echo $candidate->school ?></td>
                        <td><?php echo $candidate->fraction ?></td>
                        <td><?php echo $candidate->numberonlist ?></td>
                        <td><input type="checkbox" value="{{$candidate->id}}" name="choose"></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name='vote' >
                <input type="hidden" value="{{$voting}}" name="voting">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>ZAGŁOSUJ</button>
            </div>
        </div>
    </div>
</div>
@endsection
