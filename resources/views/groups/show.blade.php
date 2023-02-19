@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">NISN</label>
                            <input type="text" class="form-control" name="number" value="{{ $group->number }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kelas</label>
                            <input type="text" class="form-control" name="name" value="{{ $group->group_name }}" readonly>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('groups.index') }}" class="btn btn-md btn-primary">KEMBALI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
