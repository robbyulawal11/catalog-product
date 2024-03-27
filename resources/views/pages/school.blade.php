@extends('app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->address }}</td>
                    <td>
                        <form action="{{ route('school.destroy', $school->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('school.edit', $school->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
