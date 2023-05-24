@extends('homeold')

@section('content')

<div class="container mt-3">
    <div class="col-12">
        <div class="card"><div class="card-body">
            <table class=" display" id="table_id" width="1200px" >
                <thead>
                    <tr>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Region działania</th>
                    <th scope="col">Opiekun</th>
                    <th scope="col">Miasto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($media as $oneMedia)
                        <tr>
                            <td><a href={{ route('media.edit', ['idMedia' => $oneMedia->id])}}> {{$oneMedia->nazwa}} </a></td>
                            <td>{{$oneMedia->region}}</td>
                            <td>{{$oneMedia->opiekun}}</td>
                            <td>{{$oneMedia->miasto}}</td>
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
