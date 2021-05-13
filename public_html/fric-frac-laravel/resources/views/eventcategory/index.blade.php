@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fric-Frac Eventcategory index</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('eventcategory.create') }}"> Create New EventCategory</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="100px">No</th>
            <th>Name</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @foreach ($eventCategory as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td >
                    <form method="POST" action="/eventcategory/{{$item->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group text-center">
                            <a class="btn btn-success " href="/eventcategory/{{$item->id}}/edit"> Edit</a>
                            <a class="btn btn-primary " href="/eventcategory/{{$item->id}}"> View</a>
                            <button type="submit" id="delete-user" class="btn btn-danger" value="Delete"> Delete
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
