<?php

namespace FactoryMethod\app;

class CarroFabric extends VeiculoFabric {
    public function criarVeiculo(): Veiculo {
        return new Carro();
    }
}