<?php
namespace FactoryMethod\src;

require 'vendor/autoload.php';

use FactoryMethod\app\Cliente;
use FactoryMethod\app\FactoryVeiculo;

try {
    $factoryMethodVeiculo = new FactoryVeiculo();
    $veiculo = $factoryMethodVeiculo->escolhaVeiculo("Moto");
    Cliente::executarAcaoVeiculo($veiculo, "andar"); // Saída: Moto andando

} catch (\Exception $e) {
    echo $e->getMessage();
}
