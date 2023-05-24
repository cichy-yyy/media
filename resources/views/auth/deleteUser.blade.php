@extends('homeold')

@section('content')
     @can('admin')
        <div class="container">
            <div class="row justify-content-center pt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><b>{{ __('Usuń użytkownika') }}</b></div>

                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <p> Wybierz użytkownika, którego chcesz usunąć:</p>
                                <select name="selectedUser" class="form-select form-select-sm mb-3">
                                    @foreach ($users as $singleUser)
                                        <option value="{{$singleUser->id}}" @isset ($user)  @if ($singleUser->name == $user->name) selected=selected @endif @endisset>{{$singleUser->name}}
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
                @if ($confirmDelete ?? FALSE)
                    <div class="col-md-8 pt-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('deleteUserOk') }}" method="post">
                                    @csrf
                                    <p>Czy jesteś pewny, że chcesz na trwałe usunąć użytkownika: <b>{{$user->name}}</b> ?</p>
                                       <input type="hidden" name="deletingUser" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-danger btn-sm">Potwierdzam</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center  pt-4">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <div class="card-body">
                            Nie posiadasz uprawnień do usuwania użytkowników.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
