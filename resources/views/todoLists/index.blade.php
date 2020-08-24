@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Todo Lists</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('lists.create') }}"> Create New Todo List</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        @if ($todoLists)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($todoLists as $todoList)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $todoList->name }}</td>
                        <td>{{ $todoList->detail }}</td>
                        <td>
                            <form action="{{ route('lists.destroy', $todoList->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('lists.show', $todoList->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('lists.edit', $todoList->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $todoLists->links() !!}

        @endif

    </div>

@endsection