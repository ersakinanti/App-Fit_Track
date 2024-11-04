@extends('layout')

@section('content')
    <h1>Edit Pengguna</h1>

    @if ($errors->any())
        <div>
            <strong>Whoops! There were some problems with your input.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $pengguna->name) }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $pengguna->email) }}" required>
        </div>

        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $pengguna->date_of_birth) }}" required>
        </div>

        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male" {{ old('gender', $pengguna->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $pengguna->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div>
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" value="{{ old('weight', $pengguna->weight) }}" step="0.1" required>
        </div>

        <div>
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" value="{{ old('height', $pengguna->height) }}" step="0.1" required>
        </div>

        <div>
            <button type="submit">Update Pengguna</button>
        </div>
    </form>

    <a href="{{ route('pengguna.index') }}">Back to Users List</a>
@endsection
