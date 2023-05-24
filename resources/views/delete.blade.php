@extends('homeold')

@section('content')

    <br /><br />
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('media.delete') }}">
                            @csrf
                        <h2 style="color:#ff4d4d"><B>Czy jesteś pewien, że chcesz usunąć: {{$nazwa}}?</B></h2>
                        <input type="hidden" name="id_delete" value="{{ $id_media }}">
                        <br /><button type="submit" class="btn btn-danger" name="accept_delete_media">Tak</button>&nbsp
                        <a  class="btn btn-success" href={{ route('media.edit') }}>Nie</a>&nbsp
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
