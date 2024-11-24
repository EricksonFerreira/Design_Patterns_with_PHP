<?php

namespace FactoryMethod\app;

class Carro implements Veiculo {
    public function getTipo() {
        return "Carro";
    }
    public function andar() {
        echo "Carro andando";
    }
    public function parar() {
        echo "Carro parando";
    }
    public function acelerar() {
        echo "Carro acelerando";
    }
    public function frear() {
        echo "Carro freando";
    }
}