@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('admin.add') }}">
            <div class="panel panel-default">
                <div class="panel-heading">LWyniki wyborów numer X/Y</div>
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
                        <th scope="col">Liczba głosów</th>
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
                        <td><?php echo $candidate->votes ?></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
