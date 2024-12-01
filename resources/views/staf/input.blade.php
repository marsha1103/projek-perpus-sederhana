<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Input Staff Data</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('s.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br>

        <label for="idLibrary">ID Library</label>
        <input type="text" id="idLibrary" name="idLibrary" value="{{ old('idLibrary') }}"><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br>

        <label for="no_telpon">No Ponsel</label>
        <input type="text" id="no_telpon" name="no_telpon" value="{{ old('no_telpon') }}"><br>

        <label for="level">Level</label>
        <select id="level" name="level">
            <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="pengunjung" {{ old('level') == 'pengunjung' ? 'selected' : '' }}>Pengunjung</option>
        </select>
        <br>
        <label for="address">Address</label>
        <textarea id="address" name="address">{{ old('address') }}</textarea><br>

        <button type="submit">Add Staf</button>
    </form>
</body>
</html>