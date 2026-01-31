<?php

require APP_PATH . 'services/CambioService.php';

class ConversaoController

{

    public function index()
    {
        require APP_PATH . 'views/dashboard.php';
    }


    public function converter()
    {
        error_log("Controller converter() foi chamado!");

        $valor   = (float) $_POST['valor'];
        $origem  = $_POST['origem'];
        $destino = $_POST['destino'];


    
if ($origem === $destino) {
    header('Content-Type: application/json; charset=utf-8'); // importante
    echo json_encode([
        'valor_convertido' => number_format($valor, 2, ',', '.'),
        'taxa' => "1 $origem = 1 $destino"
    ]);
    exit; 
}

        $cambioService = new CambioService();
        $resultado = $cambioService->converter($origem, $destino, $valor);

    
        header('Content-Type: application/json; charset=utf-8');

        if ($resultado === null) {
            echo json_encode(['erro' => 'Erro ao consultar câmbio']);
            exit;
        }


        echo json_encode([
            'valor_convertido' => number_format($resultado['valor_convertido'], 2, ',', '.'),
            'taxa' => "1 $origem = {$resultado['taxa']} $destino"
        ]);
        exit; 
    }
}
