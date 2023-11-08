@extends('app.base')
@section('title', 'Game list')

@section('content')

<form action="{{url('settings')}}" method="post">

    @method('put')
    @csrf


    <div class="mb-3">
      Behaviour after inserting new game
    </div> 
    <input class="form-check-input" type="radio" id="showGame" name="afterInsert" value="showGames" {{ $checkedList }}/>
    <label class="form-check-label" for="showGame">Show all game list</label>
    
    <br>
    
    <input class="form-check-input" type="radio" id="createGame" name="afterInsert" value="showCreate" {{ $checkedCreate }}/>
    <label class"form-check-label" for="createGame">Show create new game form</label>
    
    <br>
    <br>

    <div class="form-group col-md-4">
        <label for="inputState">Behaviour after editing new game</label>
        <select name="editGame" id="editGame" class="form-control" aria-label="Default select example">
            <option selected hidden>Select</option>
            
             @foreach($options as $option)
             <option {{$option['value']}}> {{$option['message']}} </option>
             @endforeach
            
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Save</button>



</form>


@endsection