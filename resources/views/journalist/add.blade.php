@extends('homeold')
@section('content')

<div class="container lg" style="margin-top: 10px">
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
                    <div class="alert alert-danger">
                        {{ session('message')}}
                    </div>
                @endif
            </div>
        </div>
<div class="row">
    <div class="col-12">
      <div class="card"><div class="card-body">
          <form action="{{ route('journalist.add.data') }}" method="post">
            @csrf
        <H4><strong>Wprowadź dane dziennikarza </strong></H4><br />
            <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="">Imię:</span></div> <input type="text" name="imie" class="form-control" required></div><br />
            <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="">Nazwisko:</span></div> <input type="text" name="nazwisko" class="form-control" required></div><br />
            <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="">Stanowisko:</span></div> <input type="text" name="stanowisko" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> Region działania: </span></div><input type="text" name="region" class="form-control" required></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> Opiekun: </span></div><input type="text" name="opiekun" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Telefon:</span></div><input type="text" name="telefon1" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Telefon dodatkowy:</span></div><input type="text" name="telefon2" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Adres e-mail:</span></div><input type="email" name="email1" placeholder="name@example.com" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Dodatkowy adres e-mail:</span></div><input type="email" name="email2" placeholder="name@example.com" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Dodatkowy adres e-mail:</span></div><input type="email" name="email3" placeholder="name@example.com" class="form-control"></div><br />
            <div class="input-group"><div class="input-group-prepend">  <B>Medium współpracujące:</B></div></div><br />
                @foreach ($getMedia->chunk(40) as $pack40 )
                    <div class="row">
                    @foreach ($pack40->chunk(10) as $pack10 )
                        <div class="col-sm-3"><div class="card"><div class="card-body">
                            @foreach ($pack10 as $media )
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checklist[]" value="{{$media->id}}" id="{{$media->id}}">
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
                    <textarea class="form-control" id="Informacjie_o_uczestniku" name="informacje" rows="27"></textarea>
                </div>
                <input type="hidden" name="nowe_media">
                <br /><button type="submit" class="btn btn-success">Zapisz</button>

                </form>
            </div>
        </div>
    </div>
</div><br />
</div>


@endsection
