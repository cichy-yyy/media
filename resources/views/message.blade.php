@extends('homeold')

@section('content')
<br/>
<div class="container">
    <div class="row justify-content-center pt-4">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
