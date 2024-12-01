<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Pengunjung</h1>
    <form action="{{ route('p.update', $pengunjung) }}" method="POST">
        @csrf
        @method('PATCH')
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $pengunjung->nama }}" required><br>
        <label>ID Library</label>
        <input type="text" name="idLibrary" value="{{ $pengunjung->idLibrary }}" required><br>
        <label>Email</label>
        <input type="email" name="email" value="{{ $pengunjung->email }}" required><br>
        <button type="submit">Update</button>
</body>
</html>