@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('inc.messages')

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Book Mark
                    </button>

                    <hr>
                    <h3>My BookMarks</h3>
                    <ul class="list-group">
                        @foreach ($bookmarks as $bookmark)
                            <li class="list-group-item clearfix">
                                <a href="{{ $bookmark->url }}" target="_blank" style="">{{ $bookmark->name }}</a>
                                <span class="bg-secondary text-white p-1">{{ $bookmark->description }}</span>
                                <span class="float-end button-group">
                                    <button data-id="{{ $bookmark->id }}" class="delete-bookmark btn btn-danger btn-sm" name="button">
                                       Delete
                                    </button>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add bookmark</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('bookmarks.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Bookmark Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Bookmark URL</label>
                <input type="text" class="form-control" name="url">
            </div>
            <div class="form-group">
                <label for="">Website Description</label>
                <textarea class="form-control" name="description" cols="10" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
