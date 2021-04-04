<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="container text-center p-4">
        <h1>Data Mahasiswa</h1>
        <div class="row">
            <div class="m-auto">
                <ol class="list-group">
                    @forelse ($mahasiswas as $mahasiswa)
                        <li class="list-group-item">
                            {{$mahasiswa->nama}} (  {{$mahasiswa->nim}} ),
                            Tanggal Lahir : {{$mahasiswa->tanggal_lahir}},
                            Tanggal Lahir : {{$mahasiswa->tanggal_lahir}},
                            IPK : {{$mahasiswa->ipk}}
                        </li>
                    @empty
                        <div class="alert alert-dark d-inline-block">
                            Tidak ada data....
                        </div>
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
</body>
</html>