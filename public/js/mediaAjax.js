

$( "button[class*='but']" ).on( "click", function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
    var idBtn = $(this).data('id');
    $.ajax({
        type: "POST",
        dataType:'html',
        url : "/media/show/ajax",
        data: {
            idB: idBtn
         },
        success : function (data) {
            $( "#data_media" ).html(data);
        }
    });



//     var idBtn = $(this).data('id');
//               $.post('/m/show/ajax', {one : idBtn}, odpowiedz)

//       });

// function odpowiedz(data) {
//         var newhtml;
//         newhtml = data ;
//         $( "#data_media" ).html(data);
})
