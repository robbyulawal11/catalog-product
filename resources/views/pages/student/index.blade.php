@extends('app')
@section('content')
    <h1>List of Students</h1>
    <a href="{{ route('student.create') }}" class="btn btn-primary">Create New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">School</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->school->name }}</td>
                    <td>
                        <form action="{{ route('student.destroy', $student->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
