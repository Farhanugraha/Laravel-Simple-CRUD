@extends('layouts.app')

@section('title','Category Data')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
    </div>
    <div class="card-body">
        @if (auth()->user()->level = 'Admin')
        <a href="{{ route('category.add') }}" class="btn btn-success mb-3">Add Items</a> 
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        @if (auth()->user()->level = 'Admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php($number = 1)
                    @foreach ($category as $row)
                        <tr>
                            <th>{{ $number++ }}</th>
                            <td>{{ $row -> name }}</td>
                            @if (auth()->user()->level = 'Admin')
                            <td>
                                <a href="{{ route('category.edit',$row->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('category.delete',$row->id) }}" class="btn btn-danger">Delete</a>
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