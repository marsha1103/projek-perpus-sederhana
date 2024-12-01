 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 </head>
 <body>
    <h1>Update Staff Data</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('s.update', $staf) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $staf->name) }}"><br>

        <label for="idLibrary">ID Library</label>
        <input type="text" id="idLibrary" name="idLibrary" value="{{ old('idLibrary', $staf->idLibrary) }}"><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $staf->email) }}"><br>

        <label for="no_telpon">No Ponsel</label>
        <input type="text" id="no_telpon" name="no_telpon" value="{{ old('no_telpon', $staf->no_phone) }}"><br>

        <label for="level">Level</label>
        <select id="level" name="level">
            <option value="admin" {{ old('level', $staf->level) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="pengunjung" {{ old('level', $staf->level) == 'pengunjung' ? 'selected' : '' }}>Pengunjung</option>
        </select><br>

        <label for="address">Address</label>
        <textarea id="address" name="address">{{ old('address', $staf->address) }}</textarea><br>

        <button type="submit">Update Staff</button>
    </form>
 </body>
 </html>