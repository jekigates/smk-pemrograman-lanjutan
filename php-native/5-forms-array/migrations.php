<?php

  $nama_file_database = "database.txt";
  $file_database = ""; 
  $data = [];
  $data["jurusan"] = [
    [
      "id_jurusan" => 1,
      "nama_jurusan" => "Teknik Komputer dan Jaringan",
      "id_guru" => "",
    ],
    [
      "id_jurusan" => 2,
      "nama_jurusan" => "Akuntansi",
      "id_guru" => "",
    ],
  ];
  $data["guru"] = [
    [
      "id_guru" => 1,
      "nama_guru" => "Jeki Gates",
      "jenis_kelamin" => "L",
      "tgl_lahir" => "2004-07-17",
      "nisn" => 123,
      "id_kelas" => "",
      "id_jurusan" => 1,
      "id_mapel" => "",
    ],
    [
      "id_guru" => 2,
      "nama_guru" => "Gilbert Liau",
      "jenis_kelamin" => "P",
      "tgl_lahir" => "2004-08-20",
      "nisn" => 456,
      "id_kelas" => "",
      "id_jurusan" => 2,
      "id_mapel" => "",
    ],
  ];
    $data["mapel"] = [
    [
      "id_mapel" => 1,
      "nama_mapel" => "Matematika",
      "id_jurusan" => 1,
      "id_guru" => 1,
    ],
    [
      "id_mapel" => 2,
      "nama_mapel" => "IPA",
      "id_jurusan" => 2,
      "id_guru" => 2,
    ],
  ];

  if (!file_exists($nama_file_database)) {
    $file_database = fopen($nama_file_database, "w");
    fwrite($file_database, json_encode($data, JSON_PRETTY_PRINT));
    fclose($file_database);
  }