<?php

namespace FactoryMethod\app;

use FactoryMethod\app\CarroFabric;
use FactoryMethod\app\MotoFabric;

class FactoryVeiculo {
    const TIPO_CARRO = "Carro";
    const TIPO_MOTO = "Moto";

    private $tiposValidos = [self::TIPO_CARRO, self::TIPO_MOTO];


    public function escolhaVeiculo($tipoVeiculo): VeiculoFabric {
        if (!in_array($tipoVeiculo, $this->tiposValidos)) {
            throw new \Exception("Tipo de veículo inválido: $tipoVeiculo");
        }

        if ($tipoVeiculo == self::TIPO_CARRO) {
            return new CarroFabric();
        } else if ($tipoVeiculo == self::TIPO_MOTO) {
            return new MotoFabric();
        }
        
        // Este ponto nunca deve ser alcançado devido à validação anterior
        throw new \Exception("Tipo de veículo não reconhecido");
    }
}