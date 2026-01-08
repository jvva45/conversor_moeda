<?php

class CambioService
{
    public function converter($origem, $destino, $valor)
    {

        $url = "https://api.frankfurter.app/latest?amount=$valor&from=$origem&to=$destino";


        $resposta = file_get_contents($url);


        if ($resposta === false) {
            return null;
        }

        $dados = json_decode($resposta, true);


        $valor_convertido = array_values($dados['rates'])[0];
        $taxa = $valor_convertido / $valor;


        $valor_convertido_formatado = number_format($valor_convertido, 2);
        $taxa_formatada = number_format($taxa, 2);
        return [
            'valor_convertido' =>  $valor_convertido_formatado ,
            'taxa' =>  $taxa_formatada
        ];
    }
}
