@extends('layouts.app')

@section('content')
<div class="container" style="padding: 5px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('home.posts')
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 5px;">    
    @include('home.status')        
</div>
@endsection
