@extends('app')
@section('content')
    <h1>Edit Student</h1>
    <form action="{{ route('student.update', $student->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address">{{ $student->address }}</textarea>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="school" class="form-label">School</label>
            <select class="form-select" id="school" name="school">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" @selected($student->id == $student->school_id)>{{ $school->name }}</option>
                @endforeach
            </select>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
