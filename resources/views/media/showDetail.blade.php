@extends('homeold')

@section('content')
<style>
    .but {
        width: 200px;
        margin-bottom: 4px;
    }
</style>
<div class="container-fluid">
    <form action="{{route('media.show')}}" method="post">
        @csrf
    <p></p><H4><strong>Szybki podgląd wybranych agencji medialnych</strong></H4></p><br />
        <div class="row">
    <div class="col-4">
      <div class="card">
            <div class="card-body">
                <div class="form-group" id="filtr1">
                    <label for="filtr-1">Region:</label>
                    <select class="form-control" id="filtr-1"  name="filtrRegion">
                        <option value="all">Wszystkie</option>
                            @foreach ($regions as $region)
                            <option value={{$region->region}} @if ((isset($selectedRegion)) && $selectedRegion == $region->region) selected="selected" @endif>{{$region->region}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group" id="filtr2">
                    <label for="filtr-2">Opiekun:</label>
                    <select class="form-control" id="filtr-2"  name="filtrOpiekun">';
                        <option value="all">Wszyscy</option>
                            @foreach ($opiekuni as $opiekun)
                                <option value={{$opiekun->opiekun}} @if ((isset($selectedOpiekun)) && $selectedOpiekun == $opiekun->opiekun) selected="selected" @endif>{{$opiekun->opiekun}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>


  <input type="hidden" name="filtr_test"></div>
  <br /><button type="submit" class="btn btn-success">Pokaż</button></form><br />

  @if ($details ?? false)
  <div class="row col-12">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                @foreach ($media as $oneMedia )
                    <button type="button" data-id={{$oneMedia->id}} class="btn btn-outline-primary but btn-sm ml-2" >{{$oneMedia->nazwa}}</button>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-6" id="data_media">
            Wybierz media, które chcesz zobaczyć.
        </div>
  @endif
  <script src="{{ asset('js/mediaAjax.js') }}" defer></script>
@endsection
