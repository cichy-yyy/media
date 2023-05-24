@extends('homeold')

@section('content')
<br/>
<div class="container-lg">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action={{ route('journalist.edit.data')}} method="post">
                        @csrf
                    <H4><strong>Edycja danych dziennikarza</strong></H4><br />
                    <div class="form-group" id="media1">
                        <label for="medium1">Wybierz dziennikarza, którego dane chcesz edytować:</label>
                        <select class="form-control" id="dziennikarz1"  name="dziennikarz_edytowany">';
                            @foreach ($journalist as $rowJournalist )
                                <option value="{{$rowJournalist->id}}" @if ($rowJournalist->id == ($journalistEdited->id ?? NULL) ) selected=selected @endif>{{$rowJournalist->imie}} {{$rowJournalist->nazwisko}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br /><button type="submit" class="btn btn-success">Edytuj</button>
                    </form>
                </div>
            </div>
        </div>
    </div><br />

    @if ($details)

        <div class="row">
            <div class="col-12">
            <div class="card"><div class="card-body">
                <form action="{{ route('journalist.save.data') }}" method="post">
                    @csrf
                    <H4><strong>Wprowadź zmiany w danych dziennikarza </strong></H4><br />
                    <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="">Imię:</span></div> <input type="text" name="imie" class="form-control" value={{ $journalistEdited->imie }} required></div><br />
                    <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="">Nazwisko:</span></div> <input type="text" name="nazwisko" class="form-control" value={{ $journalistEdited->nazwisko }} required></div><br />
                    <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="">Stanowisko:</span></div> <input type="text" name="stanowisko" class="form-control" value={{ $journalistEdited->stanowisko }} ></div><br />
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> Region działania: </span></div><input type="text" name="region" class="form-control" value={{ $journalistEdited->region }} required></div><br />
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> Opiekun: </span></div><input type="text" name="opiekun" class="form-control" value={{ $journalistEdited->opiekun }} ></div><br />
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Telefon:</span></div><input type="text" name="telefon1" class="form-control"  value={{ $journalistEdited->telefon1 }} ></div><br />
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Telefon dodatkowy:</span></div><input type="text" name="telefon2" class="form-control" value={{ $journalistEdited->telefon2 }} ></div><br />
                    <div class="input-group"  ><div class="input-group-prepend"><span class="input-group-text">  Adres e-mail:</span></div><input type="email" name="email1" placeholder="name@example.com" class="form-control" value={{ $journalistEdited->email1 }}></div><br />
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Dodatkowy adres e-mail:</span></div><input type="email" name="email2" placeholder="name@example.com" class="form-control" value={{ $journalistEdited->email2 }} ></div><br />
                    <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Dodatkowy adres e-mail:</span></div><input type="email" name="email3" placeholder="name@example.com" class="form-control" value={{ $journalistEdited->email3 }} ></div><br />
                    <div class="input-group"><div class="input-group-prepend">  <B>Medium współpracujące:</B></div></div><br />
                        @foreach ($getMedia->chunk(40) as $pack40 )
                            <div class="row">
                            @foreach ($pack40->chunk(10) as $pack10 )
                                <div class="col-sm-3"><div class="card"><div class="card-body">
                                    @foreach ($pack10 as $media )
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checklist[]" value="{{$media->id}}" id="{{$media->id}}" @if(in_array($media->id, $journalistMedia)) checked @endif>
                                            <label class="form-check-label" for="{{$media->id}}">{{$media->nazwa}}</label>
                                        </div>
                                    @endforeach
                                </div></div></div>
                            @endforeach
                            </div><br />
                        @endforeach

                        <br /><br />


                        <div class="form-group">
                            <label for="Informacjie_o_uczestniku"><B>Podaj dodatkowe informacje</B></label>
                            <textarea class="form-control" id="Informacjie_o_uczestniku" name="informacje" rows="27">{{ $journalistEdited->info }}</textarea>
                        </div>
                        <input type="hidden" name="id" value="{{$journalistEdited->id}}">
                        <br /><button type="submit" class="btn btn-success">Zapisz</button>

                        </form>
                    </div>
                </div>
            </div>
        </div><br />
    </div>

    @endif

@endsection
{{-- @if ($rowJournalist->id == ($journalistEdited->id ?? NULL) ) selected=selected @endif --}}
{{-- @if ($rowJournalist->id == ($journalistEdited[0]->id ?? NULL) ) selected=selected @endif --}}
