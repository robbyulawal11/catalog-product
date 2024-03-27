@extends('app')
@section('content')
    <h1>Create new School</h1>
    <form action="{{ route('school.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">School Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">School Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
