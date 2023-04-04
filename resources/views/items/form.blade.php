@extends('layouts.app')

@section('title', 'Items Form')

@section('content')
    <form action="{{ isset($items) ? route('items.add.update', $items->id) : route('items.add.save') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($items) ? 'Edit Items' : 'Add Items' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="items_code">Code</label>
                            <input type="text" class="form-control" id="items_code" name="items_code"
                                value="{{ isset($items) ? $items->items_code : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="items_name">Name</label>
                            <input type="text" class="form-control" id="items_name" name="items_name"
                                value="{{ isset($items) ? $items->items_name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="custom-select">
                                <option value="" selected disabled hidden>Choose Category</option>
                                @foreach ($category as $row)
                                <option value="{{ $row->id }}" {{ isset($items) ? ($items->category_id = $row->id ? 'selected' : '') : '' }}>{{ $row->name }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ isset($items) ? $items->price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                value="{{ isset($items) ? $items->amount : '' }}">
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
