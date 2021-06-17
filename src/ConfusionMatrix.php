<?php

declare(strict_types = 1);
/**
 * ConfusionMatrix
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@outlook.com>
 * @version v1.0.0
 * @access public
 */

namespace Console;

class ConfusionMatrix {

    /**
     * @var int Verdadero Positivo
     */
    private $_tp;

    /**
     * @var int Verdadero Negativo
     */
    private $_tn;

    /**
     * @var int Falso Positivo
     */
    private $_fp;

    /**
     * @var int Falso Negativo
     */
    private $_fn;

    /**
     * Constructor de la clase ConfusionMatrix
     * @access public
     * @param int $tp Verdadero positivo
     * @param int $tn Verdadero Negativo
     * @param int $fp Falso positivo
     * @param int $fn Falso Negativo
     */
    public function __construct(int $tp, int $tn, int $fp, int $fn) {
        $this->_tp = intval($tp);
        $this->_tn = intval($tn);
        $this->_fp = intval($fp);
        $this->_fn = intval($fn);
    }

    /**
     * Devuelve el valor Verdadero Positivo de la Matrix de Confusión
     * @access public
     * @return int VerdaderoPositivo
     */
    public function getTruePositive(): int {
        return $this->_tp;
    }

    /**
     * Devuelve el valor Verdadero Negativo de la Matrix de Confusión
     * @access public
     * @return int Verdadero Negativo
     */
    public function getTrueNegative(): int {
        return $this->_tn;
    }

    /**
     * Devuelve el valor Falso Positivo de la Matrix de Confusión
     * @access public
     * @return int Falso Positivo
     */
    public function getFalsePositive(): int {
        return $this->_fp;
    }

    /**
     * Devuelve el valor Falso Negativo de la Matrix de Confusión
     * @access public
     * @return int Falso Negativo
     */
    public function getFalseNegative(): int {
        return $this->_fn;
    }

    /**
     * Devuelve la métrica de sensibilidad
     * @return float
     */
    public function getSensitivity(): float {
        $divisor = $this->_tp + $this->_fn;
        return ($divisor > 0) ? round($this->_tp / $divisor, 4) : 0;
    }

    /**
     * Devuelve la métrica de especificidad
     * @return float
     */
    public function getSpecificity(): float {
        $divisor = $this->_fp + $this->_tn;
        return ($divisor > 0) ? round($this->_tn / $divisor, 4) : 0;
    }

    /**
     * Devuelve la métrica de precisión
     * @return float
     */
    public function getPrecision(): float {
        $divisor = $this->_tp + $this->_fp;
        return ($divisor > 0) ? round($this->_tp / ($divisor), 4) : 0;
    }

    /**
     * Devuelve la métrica de exactitud
     * @return float
     */
    public function getAccuracy(): float {
        $divisor = $this->_tp + $this->_fp + $this->_tn + $this->_fn;
        return ($divisor > 0) ? round(($this->_tp + $this->_tn) / $divisor, 4) : 0;
    }

    /**
     * Devuelve la métrica de F1 Score
     * @return float
     */
    public function getF1Score(): float {
        $divisor = 2 * $this->_tp + $this->_fp + $this->_fn;
        return ($divisor > 0) ? round((2 * $this->_tp) / $divisor, 4) : 0;
    }

    /**
     * Devuelve la métrica de Exhaustividad (Recall)
     * @return float
     */
    public function getRecall(): float {
        $divisor = $this->_tp + $this->_fn;
        return ($divisor > 0) ? round($this->_tp / $divisor, 4) : 0;
    }

}
