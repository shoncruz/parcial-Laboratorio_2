<?php
header('Content-Type: application/json');

$resultado9 = $resultado10 = $resultado11 = $resultado12 = $resultado13 = $resultado14 = $resultado15 = $resultado16 = $resultado17 = $resultado18 = $resultado19 = $resultado20 = $resultado21 = $resultado22 = $resultado23 = $resultado24 = null;

if (isset($_POST['a']) && isset($_POST['b'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $resultado9 = ejercicio9($a, $b);
}

if (isset($_POST['c'])) {
    $c = $_POST['c'];
    $resultado10 = ejercicio10($c);
}

if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $resultado11 = ejercicio11($a, $b, $c);
}

if (isset($_POST['d']) && isset($_POST['e']) && isset($_POST['f'])) {
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $resultado12 = ejercicio11($d, $e, $f);
}

if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {
    $d = $_POST['a'];
    $e = $_POST['b'];
    $f = $_POST['c'];
    $resultado13 = ejercicio13($d, $e, $f);
}

$resultado14 = ejercicio14();

$resultado15 = ejercicio15();

if (isset($_POST['a'])) {
    $c = $_POST['a'];
    $resultado16 = ejercicio16($c);
}

if (isset($_POST['a']) && isset($_POST['b'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $resultado17 = ejercicio17($a, $b);
}

if (isset($_POST['c'])) {
    $c = $_POST['c'];
    $resultado18 = ejercicio18($c);
}

$resultado19 = ejercicio19();

$resultado20 = ejercicio20();

if (isset($_POST['cantidadNumeros'])) {
    $c = $_POST['cantidadNumeros'];
    $resultado21 = ejercicio21($c);
}

if (isset($_POST['numeros2'])) {
    $c = $_POST['numeros2'];
    $resultado22 = ejercicio22($c);
}


$resultado24 = ejercicio24();


echo json_encode(
    array(
        'resultado9' => $resultado9,
        'resultado10' => $resultado10,
        'resultado11' => $resultado11,
        'resultado12' => $resultado12,
        'resultado13' => $resultado13,
        'resultado14' => $resultado14,
        'resultado15' => $resultado15,
        'resultado16' => $resultado16,
        'resultado17' => $resultado17,
        'resultado18' => $resultado18,
        'resultado19' => $resultado19,
        'resultado20' => $resultado20,
        'resultado21' => $resultado21,
        'resultado22' => $resultado22,
        'resultado23' => $resultado23,
        'resultado24' => $resultado24
    )
);

function ejercicio9($num1, $num2)
{
    return min($num1, $num2);
}

function ejercicio10($duracion)
{
    if ($duracion <= 3) {
        return $duracion * 9.50;
    } else {
        return 3 * 9.50 + ($duracion - 3) * 1.10;
    }
}

function ejercicio11($a, $b, $c)
{
    $suma = $a + $b + $c;
    $resta = $a - $b - $c;
    $producto = $a * $b * $c;
    $cociente = ($b != 0 && $c != 0) ? $a / $b / $c : "No se puede dividir por cero";

    return [
        'suma' => $suma,
        'resta' => $resta,
        'producto' => $producto,
        'cociente' => $cociente
    ];
}

// Ejercicio 13
function ejercicio13($nota1, $nota2, $nota3)
{
    $not = 0;
    $notMin = 10; // Corregir a 10 para que la menor nota pueda ser encontrada correctamente
    $notMax = 0;
    $notas = [$nota1, $nota2, $nota3];
    foreach ($notas as $nota) {
        if ($nota < 0 || $nota > 10) {
            return "<p>Una de las notas no corresponde</p>";
        } else { // Corregir el bloque else, y ajustar el minimo
            if ($notMax < $nota) {
                $notMax = $nota;
            }
            if ($notMin > $nota) {
                $notMin = $nota;
            }
            $not += $nota;
        }
    }

    $promedio = $not / count($notas);

    return [
        'promedio' => $promedio,
        'notaMayor' => $notMax,
        'notaMenor' => $notMin
    ];
}

// Ejercicio 14
function ejercicio14()
{
    $numeros = range(1, 100);
    return $numeros;
}

// Ejercicio 15
function ejercicio15()
{
    $numeros = range(1, 100);
    $opuestos = array_map(function ($numero) {
        return -$numero;
    }, $numeros);
    return array_combine($numeros, $opuestos);
}

//ejercicio 16
function ejercicio16($numero)
{
    if ($numero < 1) {
        return "El número debe ser mayor o igual a 1";
    }
    $lista = range(1, $numero);
    return $lista;
}

// Ejercicio 17: Mostrar una lista de todos los números enteros entre dos números ordenados de menor a mayor
function ejercicio17($num1, $num2)
{
    if ($num1 < $num2) {
        return "El primer numero es menor que el segundo, Ingrese nuevamente";
    } else {
        $numeros = range($num1, $num2);
        return $numeros;
    }
}

// Ejercicio 18: Efectuar la sumatoria de todos los números que le anteceden desde el 1 hasta un número dado
function ejercicio18($numero)
{
    $sumatoria = array_sum(range(1, $numero));
    return $sumatoria;
}

// Ejercicio 19: Calcular el promedio general de una lista de 20 números

function ejercicio19()
{
    $numeros = [];
    for ($i = 0; $i < 20; $i++) {
        $numeros[] = rand(1, 100); // Genera números aleatorios entre 1 y 100
    }
    $promedio = array_sum($numeros) / count($numeros);
    return ['numeros' => $numeros, 'promedio' => $promedio];
}

function ejercicio20()
{
    $numeros = [];
    for ($i = 0; $i < 20; $i++) {
        $numeros[] = rand(1, 100); // Genera números aleatorios entre 1 y 100
    }
    $sumatoria = array_sum($numeros);
    return ['numeros' => $numeros, 'sumatoria' => $sumatoria];
}

// Ejercicio 21: Dada una lista de números calcular su promedio general
function ejercicio21($cantidadNumeros)
{
    if ($cantidadNumeros <= 0) {
        return "La cantidad de números debe ser mayor a cero.";
    }

    $numeros = [];
    for ($i = 0; $i < $cantidadNumeros; $i++) {
        $numeros[] = rand(1, 100); // Genera números aleatorios entre 1 y 100
    }

    $promedio = array_sum($numeros) / count($numeros);
    return ['numeros' => $numeros, 'promedio' => $promedio];
}

// Función para contar la cantidad de números ingresados (corta al ingresar 0 o negativo)
function ejercicio22($numeros)
{
    $numeros = explode(',', $numeros);

    $cantidad = 0;
    foreach ($numeros as $numero) {
        if ($numero <= 0) {
            break;
        }
        $cantidad++;
    }
    return $cantidad;
}


// Ejercicio 24: Generar los primeros 100 números e indicar si son pares o impares
function ejercicio24() {
    $resultado = [];
    for ($i = 1; $i <= 100; $i++) {
        // Crear un array con el número y su paridad
        $resultado[] = ["numero" => $i, "parity" => ($i % 2 == 0) ? 'Par' : 'Impar'];
    }
    // Devolver los resultados en un array asociativo con la clave "resultado24"
    return $resultado;
}




?>