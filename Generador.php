<?php
// Clase que cumple con el Objetivo A: Simulación 2.1
class Generador {
    public function calcular($semilla, $a, $c, $m, $cantidad) {
        $resultados = [];
        $x_actual = $semilla;

        for ($i = 0; $i < $cantidad; $i++) {
            // Fórmula: (a * Xn + c) mod m
            $x_siguiente = ($a * $x_actual + $c) % $m;
            
            // Normalización para obtener ri (entre 0 y 1)
            $ri = $x_siguiente / ($m - 1);
            
            $resultados[] = [
                'n' => $i + 1,
                'x' => $x_siguiente,
                'ri' => round($ri, 4)
            ];
            
            $x_actual = $x_siguiente;
        }
        return $resultados;
    }
}