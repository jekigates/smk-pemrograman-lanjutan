<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Agency Create</title>
</head>
<body>
    <form action="{{ url('/agencies') }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ps-4">
                    <a href="{{ url('/agencies') }}" class="btn btn-primary my-4">Back To Agency List</a>
                </div>
            </div>
            <div class="row">
                <div class="col-4 ps-4">
                    <div class="form-group mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>-- Choose Status --</option>
                            <option value="Jual">Jual</option>
                            <option value="Sewa">Sewa</option>
                            <option value="Take Over">Take Over</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="" hidden>-- Choose Jenis --</option>
                            <option value="Ruko">Ruko</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Tanah">Tanah</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="luas_tanah" class="form-label">Luas Tanah</label>
                        <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" placeholder="Luas Tanah">
                    </div>
                    <div class="form-group mb-4">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                        <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" placeholder="Luas Bangunan">
                    </div>
                    <div class="form-group mb-4">
                        <label for="lantai" class="form-label d-block">Lantai</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="lantai" value="1" class="form-check-input" id="lantai1">
                            <label for="lantai1" class="form-check-label">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="lantai" value="2" class="form-check-input" id="lantai2">
                            <label for="lantai2" class="form-check-label">2</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="kamar_tidur" class="form-label">Kamar Tidur</label>
                        <input type="number" name="kamar_tidur" id="kamar_tidur" class="form-control" placeholder="Kamar Tidur" min="0" value="0">
                    </div>
                    <div class="form-group mb-4">
                        <label for="kamar_mandi" class="form-label">Kamar Mandi</label>
                        <input type="number" name="kamar_mandi" id="kamar_mandi" class="form-control" placeholder="Kamar Mandi" min="0" value="0">
                    </div>
                    <div class="form-group mb-4">
                        <label for="garasi" class="form-label">Garasi</label>
                        <input type="number" name="garasi" id="garasi" class="form-control" placeholder="Garasi" min="0" value="0">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-4">
                        <label for="air" class="form-label">Air</label>
                        <input type="text" name="air" id="air" class="form-control" placeholder="Air">
                    </div>
                    <div class="form-group mb-4">
                        <label for="listrik" class="form-label">Listrik</label>
                        <input type="text" name="listrik" id="listrik" class="form-control" placeholder="Listrik">
                    </div>
                    <div class="form-group mb-4">
                        <label for="hadap" class="form-label">Hadap</label>
                        <select name="hadap" id="hadap" class="form-control">
                            <option value="" hidden>-- Choose Hadap --</option>
                            <option value="Timur">Timur</option>
                            <option value="Barat">Barat</option>
                            <option value="Selatan">Selatan</option>
                            <option value="Utara">Utara</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group mb-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" min="0" value="0">
                    </div>
                    <div class="form-group mb-4">
                        <label for="marketing" class="form-label">Marketing</label>
                        <input type="text" name="marketing" id="marketing" class="form-control" placeholder="Marketing">
                    </div>
                    <div class="form-group mb-4">
                        <label for="no_hp_marketing" class="form-label">No HP Marketing</label>
                        <input type="number" name="no_hp_marketing" id="no_hp_marketing" class="form-control" placeholder="No HP Marketing">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Store</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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