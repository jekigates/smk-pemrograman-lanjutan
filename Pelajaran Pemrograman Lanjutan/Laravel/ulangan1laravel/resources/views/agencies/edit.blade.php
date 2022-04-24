<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Agency Edit</title>
</head>
<body>
    <form action="{{ url('/agencies') }}/{{ $agency->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ps-4 mt-4">
                    <h2>Agencies Edit</h2>
                    <a href="{{ url('/agencies') }}" class="btn btn-primary mt-2 mb-4">Back To Agency List</a>
                </div>
            </div>
            <div class="row">
                <div class="col-4 ps-4">
                    <div class="form-group mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>-- Choose Status --</option>
                            <option value="Jual" @if ($agency->status == 'Jual') selected @endif>Jual</option>
                            <option value="Sewa" @if ($agency->status == 'Sewa') selected @endif>Sewa</option>
                            <option value="Take Over" @if ($agency->status == 'Take Over') selected @endif>Take Over</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="" hidden>-- Choose Jenis --</option>
                            <option value="Ruko" @if ($agency->jenis == 'Ruko') selected @endif>Ruko</option>
                            <option value="Rumah" @if ($agency->jenis == 'Rumah') selected @endif>Rumah</option>
                            <option value="Tanah" @if ($agency->jenis == 'Tanah') selected @endif>Tanah</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="luas_tanah" class="form-label">Luas Tanah</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="luas_tanah">m2</span>
                            <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" placeholder="Luas Tanah" aria-label="Luas Tanah" aria-describedby="luas_tanah" value="{{ $agency->luas_tanah }}">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="luas_bangunan">m2</span>
                            <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" placeholder="Luas Bangunan" aria-label="Luas Tanah" aria-describedby="luas_bangunan" value="{{ $agency->luas_bangunan }}">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="lantai" class="form-label d-block">Lantai</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="lantai" value="1" class="form-check-input" id="lantai1" @if ($agency->lantai == 1) checked @endif>
                            <label for="lantai1" class="form-check-label">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="lantai" value="2" class="form-check-input" id="lantai2" @if ($agency->lantai == 2) checked @endif>
                            <label for="lantai2" class="form-check-label">2</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="kamar_tidur" class="form-label">Kamar Tidur</label>
                        <input type="number" name="kamar_tidur" id="kamar_tidur" class="form-control" placeholder="Kamar Tidur" min="0" value="{{ $agency->kamar_tidur }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="kamar_mandi" class="form-label">Kamar Mandi</label>
                        <input type="number" name="kamar_mandi" id="kamar_mandi" class="form-control" placeholder="Kamar Mandi" min="0" value="{{ $agency->kamar_mandi }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="garasi" class="form-label">Garasi</label>
                        <input type="number" name="garasi" id="garasi" class="form-control" placeholder="Garasi" min="0" value="{{ $agency->garasi }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-4">
                        <label for="air" class="form-label">Air</label>
                        <input type="text" name="air" id="air" class="form-control" placeholder="Air" value="{{ $agency->air }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="listrik" class="form-label">Listrik</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="listrik">kWh</span>
                            <input type="text" name="listrik" id="listrik" class="form-control" placeholder="Listrik" aria-label="Listrik" aria-describedby="listrik" value="{{ $agency->listrik }}">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="hadap" class="form-label">Hadap</label>
                        <select name="hadap" id="hadap" class="form-control">
                            <option value="" hidden>-- Choose Hadap --</option>
                            <option value="Timur" @if ($agency->hadap == 'Timur') selected @endif>Timur</option>
                            <option value="Barat" @if ($agency->hadap == 'Barat') selected @endif>Barat</option>
                            <option value="Selatan" @if ($agency->hadap == 'Selatan') selected @endif>Selatan</option>
                            <option value="Utara" @if ($agency->hadap == 'Utara') selected @endif>Utara</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="{{ $agency->alamat }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="harga">Rp</span>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="harga" value="{{ $agency->harga }}">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="marketing" class="form-label">Marketing</label>
                        <input type="text" name="marketing" id="marketing" class="form-control" placeholder="Marketing" value="{{ $agency->marketing }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="no_hp_marketing" class="form-label">No HP Marketing</label>
                        <input type="number" name="no_hp_marketing" id="no_hp_marketing" class="form-control" placeholder="No HP Marketing" value="{{ $agency->no_hp_marketing }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
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