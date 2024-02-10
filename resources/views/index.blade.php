@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                                <div class="right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" style="color: white; background:black;"
                                        data-toggle="modal" data-target="#exampleModal">
                                        Add Category
                                    </button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="container">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                                                            data-target="#exampleModal{{ $category->id }}">Edit</a>
                                                        <form action="/categories/{{ $category->id }}" method="POST"
                                                            onsubmit="return confirm('Do you want to delete it?')">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm ml-2">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/categories/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name Category</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($categories as $category)
    <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{ $category->id }}">Edit Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/categories/{{ $category->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name Category</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $category->name }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
