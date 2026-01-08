$(document).ready(function () {

    let timeout = null;

    function converter() {
        clearTimeout(timeout);

        timeout = setTimeout(() => {

            const valor = $('#valor').val();
            const origem = $('#moeda-origem').val();
            const destino = $('#moeda-destino').val();

            console.log(origem)
            if (valor === '' || valor <= 0) return;

            $.ajax({
                url: 'converter',
                method: 'POST',
                dataType: 'json',
                data: {
                    valor: valor,
                    origem: origem,
                    destino: destino
                },
                success: function (resposta) {
                    console.log(resposta); // já é objeto

                    $('#resultado').val(resposta.valor_convertido);

                    $('#cotacao-text').text(`${resposta.taxa} `);
            
                },
                error: function (err) {
                    console.error('Erro na requisição:', err);
                }
            });

        }, 400); // espera 400ms
    }
    $('#inverter').click(function () {

        const origemVal = $("#moeda-origem").val();
        const destinoVal = $("#moeda-destino").val();


        $("#moeda-origem").val(destinoVal);
        $("#moeda-destino").val(origemVal);


        const valor = $('#valor').val();
        if (valor != '') {
            converter();
        }
    });

    $('#valor').on('input', converter);
    $('#moeda-origem, #moeda-destino').on('change', converter);

});
