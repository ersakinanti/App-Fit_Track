@extends('layout')

@section('content')
    <h1>Tambahkan Pengguna Baru</h1>

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

    <form action="{{ route('pengguna.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
        </div>

        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div>
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" value="{{ old('weight') }}" step="0.1" required>
        </div>

        <div>
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" value="{{ old('height') }}" step="0.1" required>
        </div>

        <div>
            <button type="submit">Tambahkan Pengguna</button>
        </div>
    </form>

    <a href="{{ route('pengguna.index') }}">Back to Users List</a>
@endsection
