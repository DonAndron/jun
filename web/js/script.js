/**
 * Created by dron on 23.07.17.
 */
$('#myModal').on('shown.bs.modal', function (e) {
    // do something...
    var url = "/app_dev.php/products/getList";
    $.post(url, null, function(response) {
        console.log(response);
    }, 'JSON');
});

//$ ( '#myModal' ).modal();


