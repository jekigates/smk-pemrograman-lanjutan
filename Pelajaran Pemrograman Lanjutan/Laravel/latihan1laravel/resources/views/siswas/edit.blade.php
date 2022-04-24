@extends('layouts.app')

@section('title', 'Update Siswa')

@section('content')
    <a href="/siswas">Back To Siswa List Page</a>
    <h2>Form Siswa Update Page</h2>

    <form action="/siswas/{{ $siswa->id }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="nis">NIS</label>
                    </td>
                    <td>
                        <label for="nis">:</label>
                    </td>
                    <td>
                        <input type="text" id="nis" name="nis" placeholder="NIS" value="{{ $siswa->nis }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama">Nama</label>
                    </td>
                    <td>
                        <label for="nama">:</label>
                    </td>
                    <td>
                        <input type="text" id="nama" name="nama" placeholder="Nama" value="{{ $siswa->nama }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kelas">Kelas</label>
                    </td>
                    <td>
                        <label for="kelas">:</label>
                    </td>
                    <td>
                        <input type="text" id="kelas" name="kelas" placeholder="Kelas" value="{{ $siswa->kelas }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="alamat">Alamat</label>
                    </td>
                    <td>
                        <label for="alamat">:</label>
                    </td>
                    <td>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" value="{{ $siswa->alamat }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="hp">HP</label>
                    </td>
                    <td>
                        <label for="hp">:</label>
                    </td>
                    <td>
                        <input type="text" id="hp" name="hp" placeholder="HP" value="{{ $siswa->hp }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Update</button>
                    </td>
                    <td></td>
                    <td>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection