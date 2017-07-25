/**
 * Created by dron on 23.07.17.
 */
$('#myModal').on('shown.bs.modal', function (e) {
    // do something...
    var url = "/app_dev.php/orders/new";
    $.post(url, null, function(response) {
        $('.modal-body').append(response.formHtml);
    }, 'JSON');
});

//$ ( '#myModal' ).modal();


