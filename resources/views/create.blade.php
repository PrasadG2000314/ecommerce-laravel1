@extends('layouts.app')

@section('content')
<div>
    <h1>Create a New Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Price:</label>
            <input type="number" name="price">
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
