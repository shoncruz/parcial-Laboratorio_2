<?php
header('Content-Type: application/json');

$resultado1 = $resultado2 = $resultado3 = $resultado4 = $resultado5 = $resultado6 = $resultado7 = $resultado8 = null;

if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $resultado1 = ejercicio1($a, $b, $c);
} 

if (isset($_POST['e']) && isset($_POST['f'])) {
    $e = $_POST['e'];
    $f = $_POST['f'];
    $resultado2 = ejercicio2($e, $f);
}

if (isset($_POST['g'])) {
    $g = $_POST['g'];
    $resultado3 = ejercicio3($g);
}

if (isset($_POST['h']) && isset($_POST['i'])) {
    $h = $_POST['h'];
    $i = $_POST['i'];
    $resultado4 = ejercicio4($h, $i);
}

if (isset($_POST['j'])) {
    $j = $_POST['j'];
    $resultado5 = ejercicio5($j);
}

if (isset($_POST['k'])) {
    $k = $_POST['k'];
    $resultado6 = ejercicio6($k);
}

if (isset($_POST['l']) && isset($_POST['m']) && isset($_POST['n'])) {
    $l = $_POST['l'];
    $m = $_POST['m'];
    $n = $_POST['n'];
    $resultado7 = ejercicio7($l, $m, $n);
}

if (isset($_POST['o']) && isset($_POST['p'])) {
    $o = $_POST['o'];
    $p = $_POST['p'];
    $resultado8 = ejercicio8($o, $p);
}

echo json_encode(array(
    'resultado1' => $resultado1,
    'resultado2' => $resultado2,
    'resultado3' => $resultado3,
    'resultado4' => $resultado4,
    'resultado5' => $resultado5,
    'resultado6' => $resultado6,
    'resultado7' => $resultado7,
    'resultado8' => $resultado8
));

function ejercicio1($a, $b, $c) {
    return $a + $b - $c + 100;
}

function ejercicio2($e, $f) {
    return ($e - $f) * ($e + $f);
}

function ejercicio3($num) {
    return -$num;
}

function ejercicio4($num1, $num2) {
    return $num1 * $num2;
}

function ejercicio5($numero) {
    if($numero > 100){
        return "El numero $numero es Mayor";
    } else {
        return "El numero $numero es Menor";
    }
}

function ejercicio6($numero) {
    if ($numero > 0) {
        return "El numero $numero es Positivo";
    } elseif ($numero < 0) {
        return "El numero $numero es Negativo";
    } else {
        return "El numero $numero es Nulo";
    }
}

function ejercicio7($a, $b, $c) {
    if ($a == $b && $b == $c) {
        return "El triangulo es Equilátero";
    } elseif ($a == $b || $a == $c || $b == $c) {
        return "El triangulo es Isósceles";
    } else {
        return "El triangulo es Escaleno";
    }
}

function ejercicio8($num1, $num2) {
    return max($num1, $num2);
}
?>
