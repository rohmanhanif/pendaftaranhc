@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <td> name</td>
                        <td>user</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $group as $data )
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->user_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection