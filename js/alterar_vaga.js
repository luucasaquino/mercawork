$(document).ready(function() {
    $('body').on('click', '.alterar', function() {
        var dados = { 'alterar': $(this).val() };
        $.ajax({


            type: 'POST',
            url: '../../ajax/alterar_vaga_ajax.php',
            data: dados,

            success: function(response) {

                eval($(".alt").html(response));

            }
        });
    });
});