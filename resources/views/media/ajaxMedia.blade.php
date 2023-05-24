<meta name="csrf-token" content="{{ csrf_token() }}">
<h2 style="color:#0099ff;"> Medium: {{$mediaDetails->nazwa}}</h2><br>
                Region - {{$mediaDetails->region}}<br />
                Adres -  {{$mediaDetails->ulica}}, {{$mediaDetails->kod}} {{$mediaDetails->miasto}}<br />
                Adres strony internetowej - {{$mediaDetails->strona}}<br />
                Numery telefonów: <ul>
                @if(isset($mediaDetails->telefon1) && $mediaDetails->telefon1 != "0" )
                    <li>{{$mediaDetails->telefon1}}</li>
                @endif
                @if(isset($mediaDetails->telefon2) && $mediaDetails->telefon2 != "0" )
                    <li>{{$mediaDetails->telefon2}}</li>
                @endif
                @if(isset($mediaDetails->telefon3) && $mediaDetails->telefon3 != "0" )
                    <li>{{$mediaDetails->telefon3}}</li>
                @endif
                </ul>
                Adresy e-mail: <ul>
                @if(isset($mediaDetails->email) && $mediaDetails->email != "0" )
                    <li>{{$mediaDetails->email}}</li>
                @endif
                @if(isset($mediaDetails->email2) && $mediaDetails->email2 != "0" )
                    <li>{{$mediaDetails->email2}}</li>
                @endif
                @if(isset($mediaDetails->email3) && $mediaDetails->email3 != "0" )
                    <li>{{$mediaDetails->email3}}</li>
                @endif
                @if(isset($mediaDetails->email4) && $mediaDetails->email4 != "0" )
                    <li>{{$mediaDetails->email4}}</li>
                @endif
                </ul>
                <br />Opiekun: {{$mediaDetails->opiekun}}<br /><br />
                <b>Dodatkowe informacje:</b><br />
                {!!nl2br(e($mediaDetails->info))!!}
                <br /><br /><b> Dziennikarze współpracujący:</b><br /><br /><ul>
                    @foreach ($mediaDetails->journalist as $journalist)
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#id-{{$journalist->id}}" style="margin-bottom: 5px;">{{$journalist->imie}} {{$journalist->nazwisko}}</button>
                            <div class="modal fade" id="id-{{$journalist->id}}" tabindex="-1" role="dialog" aria-labelledby="id-{{$journalist->id}}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="id-{{$journalist->id}}Label">{{$journalist->imie}} {{$journalist->nazwisko}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    Stanowisko: {{$journalist->stanowisko}}<br><br>
                                    Telefon:
                                        <ul>
                                            @isset($journalist->telefon1)<li>{{$journalist->telefon1}}</li> @endisset
                                            @isset($journalist->telefon2)<li>{{$journalist->telefon2}}</li> @endisset
                                        </ul> <br>
                                    Adres email:
                                        <ul>
                                            @isset($journalist->email1)<li>{{$journalist->email1}}</li> @endisset
                                            @isset($journalist->email1)<li>{{$journalist->email1}}</li> @endisset
                                            @isset($journalist->email1)<li>{{$journalist->email1}}</li> @endisset
                                        </ul><br>
                                    <b>Dodatkowe informacje</b><br />
                                    {!!nl2br(e($journalist->info))!!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </ul>

