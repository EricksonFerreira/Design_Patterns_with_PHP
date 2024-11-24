<?php

namespace FactoryMethod\app;

class Cliente {
    public static function executarAcaoVeiculo(VeiculoFabric $fabrica, $acao) {
        $veiculo = $fabrica->criarVeiculo();
        if (method_exists($veiculo, $acao)) {
            $veiculo->$acao();
        } else {
            echo "Ação inválida para o veículo." . PHP_EOL;
        }
    }
}
