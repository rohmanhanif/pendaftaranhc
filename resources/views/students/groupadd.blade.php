@extends('layouts.app')
@section('content')
<form action="{{ route('groups.store') }}"method='post'>
    @csrf
        <label for="">namegroup</label><br>
        <input class="form-control" type="text" name="group" id="">
        <br>
        <select class="form-select" name="user_id" id="">
            @foreach ($user as  $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
                
            @endforeach
        </select>
        <button class="btn btn-danger">sumbit</button>
    
</form>
@endsection