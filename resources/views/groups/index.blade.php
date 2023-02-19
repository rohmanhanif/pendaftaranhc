@extends('layouts.admin')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data groups - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('groups.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">USER</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $groups as $group)
                                <tr>
                                    <td>{{$group->id}}</td>
                                    <td>{{$group->user_id}}</td>
                                    <td>{{$group->name}}</td>
                                    <td class="text-center">
                                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-primary">EDIT</a>

                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data student belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        <?php
if (session()->has('success')) {
    echo 'toastr.success("' . session('success') . '", "BERHASIL!");';
} elseif (session()->has('error')) {
    echo 'toastr.error("' . session('error') . '", "GAGAL!");';
}
?>

    </script>

</body>

</html>

@stop