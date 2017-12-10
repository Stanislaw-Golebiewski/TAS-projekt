@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ route('admin.add') }}">
            <div class="panel panel-default">
                <div class="panel-heading">List of Candidates</div>
                    {{ csrf_field() }}
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Partia</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Jan</td>
                        <td>Kowalski</td>
                        <td>PW</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Tomek</td>
                        <td>Drabik</td>
                        <td>QZ</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Maciej</td>
                        <td>Makuła</td>
                        <td>WON</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
