@extends('homeold')

@section('content')

<br>
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
        <div class="col">
          <div class="card">
            <div class="card-body">
                <form action={{ route('media.add.data')}} method="post">
                    @csrf
                    <H4><strong>Wprowadź dane agencji medialnej </strong></H4><br />
                <div class="input-group "><div class="input-group-prepend " ><span class="input-group-text" id="">Nazwa:</span></div> <input type="text" name="nazwa" class="form-control @error('nazwa') is-invalid @enderror" required></div>
                    @error('nazwa') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> Region działania: </span></div><input type="text" name="region" class="form-control @error('region') is-invalid @enderror" required></div>
                    @error('region') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text"> Opiekun: </span></div><input type="text" name="opiekun" class="form-control @error('opiekun') is-invalid @enderror" required></div>
                    @error('opiekun') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <p><strong> Dane adresowe:</strong></p>
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Miasto:</span></div><input type="text" name="miasto" class="form-control @error('miasto') is-invalid @enderror"></div>
                    @error('miasto') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Ulica:</span></div><input type="text" name="ulica" class="form-control @error('ulica') is-invalid @enderror"></div>
                    @error('ulica') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Kod pocztowy:</span></div><input type="text" name="kod_pocztowy" class="form-control @error('kod_pocztowy') is-invalid @enderror"></div>
                    @error('kod_pocztowy') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Strona internetowa:</span></div><input type="text" name="strona" class="form-control @error('strona') is-invalid @enderror"></div>
                    @error('strona') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="form-group"><label for="email-input">Adres e-mail:</label><input type="email" class="form-control @error('email') is-invalid @enderror" id="email-input" placeholder="name@example.com" name="email"></div>
                    @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="form-group"><label for="email-input">Dodatkowe adresy e-mail:</label><input type="email" class="form-control @error('email2') is-invalid @enderror" id="email-input2" placeholder="name@example.com" name="email2"></div>
                    @error('email2') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                <div class="form-group"><input type="email" class="form-control @error('email3') is-invalid @enderror" id="email-input3" placeholder="name@example.com" name="email3"></div>
                    @error('email3') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                <div class="form-group"><input type="email" class="form-control @error('email4') is-invalid @enderror" id="email-input4" placeholder="name@example.com" name="email4"></div>
                    @error('email4') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Numer telefonu:</span></div><input type="text" name="telefon1" class="form-control @error('telefon1') is-invalid @enderror"></div>
                    @error('telefon1') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Numer telefonu:</span></div><input type="text" name="telefon2" class="form-control @error('telefon2') is-invalid @enderror"></div>
                    @error('telefon2') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
                <div class="input-group"><div class="input-group-prepend"><span class="input-group-text">  Numer telefonu:</span></div><input type="text" name="telefon3" class="form-control @error('telefon3') is-invalid @enderror"></div>
                    @error('telefon3') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror <br />
            </div>
        </div>
    </div>
    <div class="col">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="Informacjie_o_uczestniku">Podaj dodatkowe informacje</label>
                    <textarea class="form-control @error('informacje') is-invalid @enderror" id="Informacjie_o_uczestniku" name="informacje" rows="27"></textarea>
                         @error('informacje') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <br /><button type="submit" class="btn btn-success">Zapisz</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
