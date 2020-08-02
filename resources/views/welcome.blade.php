@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4">Last Entries</div>
                    
                    @foreach ($entries as $entry)
                        <div class="card mb-4">
                            <div class="card-header"><p>{{$entry->id}}. {{ $entry->title }}</p></div>
                            <div class="card-body"><p>{{ $entry->content }}</p></div>
                            <div class="card-footer">
                                Author:
                            <a href="{{ url('users/'.$entry->user_id)}}" class="href">
                                    {{ $entry->user->name }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{ $entries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
