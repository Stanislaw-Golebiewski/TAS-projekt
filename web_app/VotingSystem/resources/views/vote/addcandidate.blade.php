@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <form class="form-horizontal" method="POST" action="{{ route('voting.chooseFractionAndNumberOnList') }}">
            <div class="panel panel-default">
              <div class="panel-heading">Wybierz głosowanie</div>
                <div class="panel-body">
                  <div class="col-md-12 selectContainer">
                    <select class="form-control" name="voting">
                      <option hidden>Wybierz głosowanie</option>
                      @foreach ($votings as $voting)
                      <option value ="{{$voting->id}}">{{$voting->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Wybierz kandydatów</div>
                  {{ csrf_field() }}
                <div class="panel-body">
                  <input class="form-control" id="filter" type="text" placeholder="Szukaj">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Rok urodzenie</th>
                        <th scope="col">Wyszktałcenie</th>
                        <th scope="col">Wybierz osobę</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($candidates as $candidate)
                      <tr name="dane">
                        <td><?php echo $candidate->id ?></td>
                        <td><?php echo $candidate->name ?></td>
                        <td><?php echo $candidate->surname ?></td>
                        <td><?php echo $candidate->born ?></td>
                        <td><?php echo $candidate->school ?></td>
                        <td><input type="checkbox" value="{{$candidate->id}}" name="choose[]"></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name='vote' >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>WYBIERZ</button>
            </div>
          </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#filter").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();

        // Loop through the comment list
        $("tr[name=dane]").each(function(){

            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();

            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).fadeIn();
            }
        });
    });
});
</script>
@endsection
