@extends('layouts.app')

@section('title', 'Siswas List')

@section('content')
    <div style="background: #388BF2; font-size: 24px; color: white;">
        Simple Siswa App
    </div>

    <div style="margin: 20px 0;">
        <table border="1">
            <a href="/siswas/create">Add New Siswa</a>

            <thead>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>HP</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($siswas as $index => $siswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <a href="{{ url('/siswas', $siswa->id) }}">{{ $siswa->nis }}</a>
                        </td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->hp }}</td>
                        <td>
                            <a href="{{ url('/siswas') }}/{{ $siswa->id }}/edit">Edit</a>
                            <form method="POST" action="/siswas/{{ $siswa->id }}" style="display: inline-block; ">
                                {{ @csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div>
                                    <input type="submit" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection