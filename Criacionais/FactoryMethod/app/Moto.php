<?php

namespace FactoryMethod\app;

class Moto implements Veiculo {
    public function getTipo() {
        return "Moto";
    }
    public function andar() {
        echo "Moto andando";
    }
    public function parar() {
        echo "Moto parando";
    }
    public function acelerar() {
        echo "Moto acelerando";
    }
    public function frear() {
        echo "Moto freando";
    }
}