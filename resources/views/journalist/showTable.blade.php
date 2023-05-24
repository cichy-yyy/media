@extends('homeold')

@section('content')
<div class="container mt-3">
    <div class="col-12">
        <div class="card"><div class="card-body">
            <table class=" display" id="table_id" width="1200px" >
                <thead>
                    <tr>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Region działania</th>
                    <th scope="col">Opiekun</th>
                    <th scope="col">Medium</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journalists as $journalist)
                        <tr>
                            <td><a href={{ route('journalist.editDataLink', ['id' => $journalist->id])}}>{{$journalist->imie}}</a></td>
                            <td>{{$journalist->nazwisko}}</td>
                            <td>{{$journalist->region}}</td>
                            <td>{{$journalist->opiekun}}</td>
                            <td>@if ($journalist->media)
                                @foreach ($journalist->media as $media)
                                    {{$media->nazwa}},
                                @endforeach
                            @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div></div>
    </div>
</div>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable({
            "language": {
                "lengthMenu": "Pokaż _MENU_ wpisów na stronę",
                "zeroRecords": "Nic nie znalexiono - sorry",
                "info": "Strona _PAGE_ z _PAGES_",
                "infoEmpty": "Brak rekordów",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "sSearch": "Szukaj",
                "infoFiltered": " (_TOTAL_ spośród _MAX_ rekordów)",
                "paginate": {
                  "previous": "Wstecz",
                  "next": "Następna"
                }
            }

        });
    } );
    </script>

@endsection
