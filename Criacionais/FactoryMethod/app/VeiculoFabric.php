<?php

namespace FactoryMethod\app;

abstract class VeiculoFabric {
    abstract public function criarVeiculo(): Veiculo;
}