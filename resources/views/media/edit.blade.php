@extends('homeold')

@section('content')

    <br />
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
        <div class="row"><div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message')}}
                    </div>
                @endif
                </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('media.edit.data')}}" method="post">
                            @csrf
                        <H4><strong>Edycja medium</strong></H4><br />
                        <div class="form-group" id="media1">
                            <label for="medium1">Wybierz agencję medialną, którą chcesz edytować:</label>
                            <select class="form-control" id="Medium1"  name="MediumSelectedID">';
                                @foreach ($name as $media )
                                    <option value="{{$media['id']}}" @if ($media['id'] == ($data->id ?? NULL) ) selected=selected @endif >{{$media['nazwa']}}</option>';
                                @endforeach
                            </select>
                        </div>
                        <br /><button type="submit" class="btn btn-success">Edytuj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ( $details ?? false)

    <br />
		<div class="container-lg">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
						<form action="{{ route('media.edit.save')}}" method="post">
                            @csrf
						<H4><strong>Edycja medium</strong></H4><br />
							<div class="row">
								<div class="col">
									<div class="card">
										<div class="card-body">
										<form action="dodaj_media.php" method="post">
										<H4><strong>Wprowadź dane agencji medialnej </strong></H4><br />
											<div class="input-group">
												<div class="input-group-prepend" >
													<span class="input-group-text" id="">Nazwa:</span>
												</div>
												<input type="text" name="nazwa" class="form-control" required value="{{$data->nazwa}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"> Region działania: </span>
												</div>
												<input type="text" name="region" class="form-control" required value="{{$data->region}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"> Opiekun: </span>
												</div>
												<input type="text" name="opiekun" class="form-control" required value="{{$data->opiekun}}">
											</div><br />
											<p><strong> Dane adresowe:</strong></p>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">  Miasto:</span>
												</div>
												<input type="text" name="miasto" class="form-control" value="{{$data->miasto??NULL}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">  Ulica:</span>
												</div>
												<input type="text" name="ulica" class="form-control" value="{{$data->ulica??NULL}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">  Kod pocztowy:</span>
												</div>
												<input type="text" name="kod_pocztowy" class="form-control" value="{{$data->kod??NULL}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text">  Strona internetowa:</span>
												</div>
												<input type="text" name="strona" class="form-control" value="{{$data->strona??NULL}}">
											</div><br />
											<div class="form-group">
												<label for="email-input">Adres e-mail:</label><input type="email" class="form-control" id="email-input" placeholder="name@example.com" name="email" value='{{$data->email??NULL}}'>
											</div><br />
											<div class="form-group">
												<label for="email-input">Dodatkowe adresy e-mail:</label><input type="email" class="form-control" id="email-input2" placeholder="name@example.com" name="email2" value="{{$data->email2??NULL}}">
											</div>
      										<div class="form-group">
											  	<input type="email" class="form-control" id="email-input3" placeholder="name@example.com" name="email3" value="{{$data->email3??NULL}}">
											</div>
      										<div class="form-group">
											  	<input type="email" class="form-control" id="email-input4" placeholder="name@example.com" name="email4" value="{{$data->email4??NULL}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text">  Numer telefonu:</span>
												</div>
												<input type="text" name="telefon1" class="form-control"  value="{{$data->telefon1??NULL}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text">  Numer telefonu:</span>
												</div>
												<input type="text" name="telefon2" class="form-control" value="{{$data->telefon2??NULL}}">
											</div><br />
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">  Numer telefonu:</span>
												</div>
												<input type="text" name="telefon3" class="form-control" value="{{$data->telefon3??NULL}}">
											</div><br />
										</div>
									</div>
								</div>
									<div class="col">
										<div class="card">
											<div class="card-body">
												<div class="form-group">
													<label for="Informacjie_o_uczestniku"><H4>Podaj dodatkowe informacje</H4></label>
													<textarea class="form-control" id="Informacje_o_uczestniku" name="informacje" rows="27" >{{$data->info ??NULL}}</textarea>
												</div>
												<input type="hidden" name="media_edycja_allow">
												<input type="hidden" name="id" value="{{$data->id}}">
												<br /><button type="submit" class="btn btn-success">Zapisz</button>
												<br /><br /><b> Dziennikarze współpracujący:</b><br />
                                                <ul>
                                                    {{-- @php
                                                        dump($data->journalist);
                                                    @endphp --}}
                                                    @foreach ( $data->journalist as $journalist )
                                                        <li><a href={{ route('journalist.editDataLink', ['id' => $journalist->id])}}> {{$journalist->imie}} {{$journalist->nazwisko}} </a></li>
                                                    @endforeach
												</ul>
											</div>
										</div>
										<br /><button type="submit" formaction="{{ route('media.delete') }}" name="media_delete" class="btn btn-danger">Usuń medium</button>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

    @endif
@endsection
