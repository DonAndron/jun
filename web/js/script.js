$('#myModal').on('hidden.bs.modal', function (e) {
    $('.modal-body').empty();
});

$('.container').on('click', '.modal-button', function (e) {
    e.preventDefault();

    $($(this).data().target).modal('show');
    $.post($(this).attr('href'), null, function (response) {
        $('.modal-body').append(response.formHtml);
    }, 'JSON');
});


$('.modal').on('submit', 'form', (function (e) {
    e.preventDefault();
    var $form = $(this);
    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize()
    }).done(function (e) {
        $('#myModal').modal('hide');
        var typeId = $('#' + e.typeId);
        typeId.length ?
            typeId.replaceWith(e.row) :
            $('tbody').append(e.row);

    }).fail(function (e) {
        console.log(e);
    });
}));





