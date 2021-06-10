# Aplicación Matriz de Confusión

Esta es una aplicación de consola desarrollada en PHP y Symfony Console.

### Instalación

* Clonar repositorio [aquí](https://github.com/gchacaltana/confusionMatrix.git).
* cd `confusionMatrix`
* Ejecutar en su consola `composer require symfony/console

# Uso
  
    Uso:
    ./App.php [options] [arguments]

    Options:
    -h, --help            Muestra mensajes de ayuda
    -q, --quiet           No muestra mensaje
    -V, --version         Muestra la versión de la aplicación
        --ansi            Forzar ANSI output
        --no-ansi         Inhabilitar ANSI output

    Comandos disponibles:
    main   Calcula y muestra métricas de la Matriz de Confusión.
    help   Muestra mensaje de ayuda para el comand-line
    list   Lista de metodos (commands)
	
	Argumentos:
	<TP> Verdadero Positivo
	<TN> Verdadero Negativo
	<FP> Falso Positivo
	<FN> Falso Negativo

# Ejecución

```sh
./App.php main 80 20 40 15
```

Salida
```sh

**** Matriz de Confusión ****
*****************************

TP: Verdadero Positivo = 80
TN: Verdadero Negativo = 20
FP: Falso Positivo = 40
FN: Falso Negativo = 15

Sensitivity = 0.8421
Specificity = 0.3333
Precision = 0.6667
Accuracy = 0.6452
F1 Score = 0.7442

```