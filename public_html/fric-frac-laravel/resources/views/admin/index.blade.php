@extends('layout')
@section('content')

    <div class="row">
        <div class="card-columns">
            <div class="card" style="width: 300px;">
                <div class="card-body" style="padding: 10px;">
                    <h3 class="card-title text-center">Event Category</h3>
                    <div class="text-center">
                        <a href="{{ route('eventcategory.index') }}" class="btn btn-primary ">Overzicht</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
