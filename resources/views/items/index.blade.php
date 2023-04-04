@extends('layouts.app')

@section('title','Items Data')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
    </div>
    <div class="card-body">
        @if (auth()->user()->level = 'Admin')
        <a href="{{ route('items.add') }}" class="btn btn-success mb-3">Add Items</a> 
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Amount</th>
                        @if (auth()->user()->level = 'Admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php($number = 1)
                    @foreach ($data as $row)
                        <tr>
                            <th>{{ $number++ }}</th>
                            <td>{{ $row -> items_code }}</td>
                            <td>{{ $row -> items_name }}</td>
                            <td>{{ $row -> category->name }}</td>
                            <td>{{ $row -> price }}</td>
                            <td>{{ $row -> amount }}</td>
                            @if (auth()->user()->level = 'Admin')
                            <td>
                                <a href="{{ route('items.edit',$row->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('items.delete',$row->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection