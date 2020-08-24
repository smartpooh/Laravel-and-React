@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2> Show Todo List</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('lists.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $todoList->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    {{ $todoList->detail }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>List Items</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('items.create', ['todoListId' => $todoList->id]) }}"> Add
                        list item</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($listItems)
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($listItems as $listItem)
                    <tr>
                        <td>{{ $listItem->name }}</td>
                        <td>{{ $listItem->detail }}</td>
                        <td>
                            <form action="{{ route('items.destroy', $listItem->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('items.edit', $listItem->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection