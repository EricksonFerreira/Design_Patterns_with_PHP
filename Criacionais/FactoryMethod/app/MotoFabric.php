<?php

namespace FactoryMethod\app;

class MotoFabric extends VeiculoFabric {
    public function criarVeiculo(): Veiculo {
        return new Moto();
    }
}