@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit entry</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('entries/'.$entry->id)}}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="form-group ">
                            <label for="title" >Title</label>

                            <div class="">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $entry->title) }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="title"> Content</label>
                            <div class="">
                                <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required>
                                    {{old('content', $entry->content ) }}
                                </textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"> Save Changes </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
