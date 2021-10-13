@extends('layouts.app')

@section('title', 'Show Siswa')

@section('content')
    <a href="/siswas">Back To Siswa List Page</a>
    <h2>Show Siswa</h2>

    <p>Nis: {{ $siswa->nis }}</p>
    <p>Nama: {{ $siswa->nama }}</p>
    <p>Kelas: {{ $siswa->kelas }}</p>
    <p>Alamat: {{ $siswa->alamat }}</p>
    <p>HP: {{ $siswa->hp }}</p>
    <p>Created At: {{ $siswa->created_at }}</p>
    <p>Updated At: {{ $siswa->updated_at }}</p>
@endsection