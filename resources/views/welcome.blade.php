<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">ID</th>
                    <th scope="col">NamaSiswa</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Gender</th>
                   
                    <th scope="col">Email</th>
                    <th scope="col">File</th>

                    
                </tr>
            </thead>
            <tbody>
               
                    @foreach($syllabus as $p)

                    <tr>
                        <td>
                            <a href="http://localhost/idbc/edit.php?id={{ $p->no }}">
                                Edit
                            </a>
                        </td>
                        <td>{{ $p->no }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->nohp }}</td>
                        <td>{{ $p->jenkel }}</td>
                        
                        <td>{{ $p->email }}</td>
                        <td><img class="img-thumbnail" width="100" src="assets/{{ $p->foto }}" /></td>

                        @endforeach
                        
                    
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- JQUERY 3.X -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // alert('Hallo');
            const modal = document.getElementById('exampleModal')
            modal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id');
                const aksi = button.getAttribute('data-bs-aksi');
                // console.log(id);
                $.post('form.php', {
                    id,
                    aksi
                }, function(a) {
                    // console.log(a);
                }).done(function(x) {
                    $('.modal-body').html(x);
                }).fail(function() {
                    alert("error");
                }).always(function() {
                    // alert("finished");
                });
            });


            // proses update
            $("#form").submit(function(event) {
                event.preventDefault();
                // const data_form = this.serialize();
                // console.log(data_form);
            })

        });
    </script>
</body>

</html>