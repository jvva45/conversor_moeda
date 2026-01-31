<?php
$moedasJson = file_get_contents('https://api.frankfurter.app/currencies');

$moedas = json_decode($moedasJson, true);

?>

<div class="card p-4 shadow converter-card">


    <div class="mb-4">
        <label class="text-muted mb-1 d-block">Você paga</label>

        <div class="d-flex align-items-center gap-3 input-box">
            <input
                id="valor"
                type="number"
                class="form-control form-control-lg bg-transparent text-white border-0">

            <select id="moeda-origem" class="form-select currency-select ">
                <?php
                foreach ($moedas as $codigo => $nome) {
                    $sigla = substr($codigo, 0, 3);
                    echo "<option value=\"$sigla\">$sigla</option>";
                }

                ?>
            </select>
        </div>
    </div>


    <div class="text-center my-3">
        <button id="inverter" class="btn btn-success rounded-circle swap-btn">
            ↕
        </button>
    </div>


    <div class="mb-4">
        <label class="text-muted mb-1 d-block">Você recebe</label>

        <div class="d-flex align-items-center gap-3 input-box">
            <input
                id="resultado"
                type="text"
                class="form-control form-control-lg bg-transparent text-success border-0"

                disabled>


            <select id="moeda-destino" class="form-select currency-select">
                <?php
                foreach ($moedas as $codigo => $nome) {
                    $sigla = substr($codigo, 0, 3);
                    echo "<option value=\"$sigla\">$sigla</option>";
                }

                ?>
            </select>
        </div>
    </div>

    <div class="text-center text-muted mb-3">
        <small id="cotacao-text"></small>
    </div>

    <?php require __DIR__ . '/teclado-numerico.php'; ?>

</div>