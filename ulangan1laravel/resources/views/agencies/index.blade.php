<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Agency Index</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4 ps-4">
                <h2>Agencies Index</h2>

                <a href="{{ url('/agencies/create') }}" class="btn btn-primary mt-2 mb-4">Create Agency</a>
  
                <table class="table">
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Status</th>
                            <th>Jenis</th>
                            <th>Luas Tanah</th>
                            <th>Luas Bangunan</th>
                            <th>Lantai</th>
                            <th>Kamar Tidur</th>
                            <th>Kamar Mandi</th>
                            <th>Garasi</th>
                            <th>Air</th>
                            <th>Listrik</th>
                            <th>Hadap</th>
                            <th>Alamat</th>
                            <th>Harga</th>
                            <th>Marketing</th>
                            <th>No HP Marketing</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($agencies as $agency)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $agency->status }}</td>
                                <td>{{ $agency->jenis }}</td>
                                <td>{{ $agency->luas_tanah }} <sup>m2</sup></td>
                                <td>{{ $agency->luas_bangunan }} <sup>m2</sup></td>
                                <td>{{ $agency->lantai }}</td>
                                <td>{{ $agency->kamar_tidur }}</td>
                                <td>{{ $agency->kamar_mandi }}</td>
                                <td>{{ $agency->garasi }}</td>
                                <td>{{ $agency->air }}</td>
                                <td>{{ $agency->listrik }} <sup>kWh</sup></td>
                                <td>{{ $agency->hadap }}</td>
                                <td>{{ $agency->alamat }}</td>
                                <td>Rp {{ $agency->harga }}</td>
                                <td>{{ $agency->marketing }}</td>
                                <td>{{ $agency->no_hp_marketing }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ url('/agencies') }}/{{ $agency->id }}/edit" class="btn btn-info" type="button">Edit</a>
    
                                        <form action="{{ url('/agencies') }}/{{ $agency->id }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
    
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html>