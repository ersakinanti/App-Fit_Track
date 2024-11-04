@extends('layout')

@section('content')
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('pengguna.create') }}">Tambahkan Pengguna Baru</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Weight</th>
            <th>Height</th>
            <th>Actions</th>
        </tr>
        @foreach ($pengguna as $pengguna)
            <tr>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->date_of_birth }}</td>
                <td>{{ $pengguna->gender }}</td>
                <td>{{ $pengguna->weight }}</td>
                <td>{{ $pengguna->height }}</td>
                <td>
                    <a href="{{ route('pengguna.edit', $pengguna->id) }}">Edit</a>
                    <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
