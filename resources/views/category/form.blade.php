@extends('layouts.app')

@section('title', 'Category Form')

@section('content')
    <form action="{{ isset($category) ? route('category.add.update', $category->id) : route('category.add.save') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category Names</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ isset($category) ? $category->name : '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
