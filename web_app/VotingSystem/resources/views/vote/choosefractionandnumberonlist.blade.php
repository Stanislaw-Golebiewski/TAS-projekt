@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <form class="form-horizontal" method="POST" action="{{ route('voting.addCandidateTo') }}">
            <input type="hidden" name="voting" value="{{$voting['id']}}">
            <div class="panel panel-default">
                <div class="panel-heading">Wybierz kandydatów do głosowania: {{$voting['name']}} </div>
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
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($candidates as $candidate)
                      <input type="hidden" name="idCandidate[]" value="{{$candidate['id']}}">
                      <tr name="dane">
                        <td><?php echo $candidate['id'] ?></td>
                        <td><?php echo $candidate['name'] ?></td>
                        <td><?php echo $candidate['surname'] ?></td>
                        <td><?php echo $candidate['born'] ?></td>
                        <td><?php echo $candidate['school'] ?></td>
                        <td>
                          <select class="form-control" name="fraction[]">
                            <option hidden>[NAZWA][SKRÓT][ID]</option>
                            @foreach ($fractions as $fraction)
                            <option value ="{{$fraction->id}}">[{{$fraction->name}}][{{$fraction->shortName}}][{{$fraction->id}}]</option>
                            @endforeach
                          </select>
                        </td>
                        <td><input type="number" class="form-control" min="0"  name="numberOnList[]" placeholder="Numer na liście"></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name='vote' >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>DODAJ</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
