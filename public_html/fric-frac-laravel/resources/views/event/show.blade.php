@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Event</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" id="name" class="form-control" name="name" value="{{$event->name}}" disabled/>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input class="form-control" type="text" id="location" name="location" value="{{$event->location}}"
                           disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Start:</strong>
                    <input class="form-control" type="text" required id="starts" name="starts"
                           value="{{($event->starts)}}" disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>End:</strong>
                    <input class="form-control" type="text" required id="ends" name="ends" value="{{($event->ends)}}"
                           disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input class="form-control" type="url" id="image" name="image" value="{{$event->image}}" disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input class="form-control" type="text" id="description" name="description"
                           value="{{$event->description}}" disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Organiser:</strong>
                    <input class="form-control" type="text" id="organiserName" name="organiserName"
                           value="{{$event->organiserName}}" disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Organiser description:</strong>
                    <input class="form-control" type="text" id="organiserDescription" name="organiserDescription"
                           value="{{$event->organiserDescription}}" disabled/>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Event Category:</strong>
                    <select id="eventCategoryId" name="eventCategoryId" class="form-control" disabled>

                        @foreach ($eventCategory as $item)
                            <option value="{{$item->id}}"
                                {{ $item->id === $event->eventCategoryId ? 'selected = "selected"' : ''}}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Event Topic:</strong>
                    <select id="eventTopicId" name="eventTopicId" class="form-control" disabled>
                        @foreach ($eventTopic as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id === $event->eventTopicId ? 'selected = "selected"' : ''}}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-success" href="/event/{{$event->id}}/edit"> Edit</a>
            </div>
        </div>
    </form>
@endsection
