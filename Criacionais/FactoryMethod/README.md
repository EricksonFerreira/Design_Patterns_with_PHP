O padrão **Factory Method** é um padrão de design criacional que fornece uma interface para criar objetos em uma classe, mas permite que subclasses decidam qual classe instanciar. Ele promove a desacoplamento entre a criação de objetos e o uso desses objetos, permitindo que o código seja mais flexível e fácil de manter.

### Principais Características do Padrão Factory Method:

1. **Desacoplamento**: O padrão separa a lógica de criação de objetos da lógica de uso. Isso significa que o código que usa os objetos não precisa saber como eles são criados.

2. **Subclasses**: As subclasses são responsáveis por implementar a lógica de criação dos objetos. Isso permite que diferentes subclasses possam criar diferentes tipos de objetos.

3. **Interface Comum**: O padrão geralmente envolve uma interface ou classe abstrata que define um método para criar objetos. As subclasses implementam esse método para retornar instâncias de classes concretas.

### Como o Sistema Realiza o Padrão Factory Method

No seu sistema, o padrão Factory Method é implementado da seguinte forma:

1. **Interface `Veiculo`**: Define os métodos que todos os veículos devem implementar, como `getTipo()`, `andar()`, `parar()`, `acelerar()`, e `frear()`.

   ```php
   interface Veiculo {
       public function getTipo();
       public function andar();
       public function parar();
       public function acelerar();
       public function frear();
   }
   ```

2. **Classes Concretas (`Carro` e `Moto`)**: Implementam a interface `Veiculo`, fornecendo a lógica específica para cada tipo de veículo.

   ```php
   class Carro implements Veiculo {
       // Implementação dos métodos
   }

   class Moto implements Veiculo {
       // Implementação dos métodos
   }
   ```

3. **Classe Abstrata `VeiculoFabric`**: Define um método abstrato `criarVeiculo()`, que deve ser implementado pelas subclasses.

   ```php
   abstract class VeiculoFabric {
       abstract public function criarVeiculo(): Veiculo;
   }
   ```

4. **Fábricas Concretas (`CarroFabric` e `MotoFabric`)**: Implementam a classe `VeiculoFabric` e são responsáveis por criar instâncias de `Carro` e `Moto`, respectivamente.

   ```php
   class CarroFabric extends VeiculoFabric {
       public function criarVeiculo(): Veiculo {
           return new Carro();
       }
   }

   class MotoFabric extends VeiculoFabric {
       public function criarVeiculo(): Veiculo {
           return new Moto();
       }
   }
   ```

5. **Classe `FactoryVeiculo`**: Contém a lógica para escolher qual fábrica usar com base no tipo de veículo solicitado. O método `escolhaVeiculo()` retorna a fábrica apropriada.

   ```php
   class FactoryVeiculo {
       public function escolhaVeiculo($tipoVeiculo): VeiculoFabric {
           // Lógica para escolher a fábrica
       }
   }
   ```

6. **Classe `Cliente`**: Utiliza a fábrica para criar veículos e executar ações sobre eles. O cliente não precisa saber como os veículos são criados, apenas que pode solicitar um veículo e executar ações.

   ```php
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
   ```

### Exemplo de Uso

No arquivo `index.php`, você cria uma instância de `FactoryVeiculo`, solicita um tipo de veículo e utiliza a classe `Cliente` para criar e exibir o veículo:

```php
$factoryMethodVeiculo = new FactoryVeiculo();
$veiculo = $factoryMethodVeiculo->escolhaVeiculo("carro");
Cliente::executarAcaoVeiculo($veiculo, "andar");
```

### Conclusão

O padrão Factory Method permite que seu sistema seja facilmente extensível. Se você quiser adicionar um novo tipo de veículo, como um `Caminhao`, basta criar uma nova classe `Caminhao`, uma nova fábrica `CaminhaoFabric`, e adicionar a lógica correspondente na classe `FactoryVeiculo`. Isso evita a necessidade de modificar o código existente, seguindo o princípio de aberto/fechado (aberto para extensão, fechado para modificação).