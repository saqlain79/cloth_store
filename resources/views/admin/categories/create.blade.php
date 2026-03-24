@extends('admin.layouts.app')

@section('content')

<main class="col-md-9 m-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2">New Category</h1>
    </div>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" required>
    </div>
    <div class="form-group">
        <label for="parent_id">Parent Category</label>
        <select class="form-control" name="parent_id" id="parent_id">
            <option value="">Select a Parent Category</option>
            @foreach($category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Save</button>
</form>

</main>

@endsection