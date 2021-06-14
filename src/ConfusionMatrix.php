<?php

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
    public function getTruePositive() {
        return $this->_tp;
    }

    /**
     * Devuelve el valor Verdadero Negativo de la Matrix de Confusión
     * @access public
     * @return int Verdadero Negativo
     */
    public function getTrueNegative() {
        return $this->_tn;
    }

    /**
     * Devuelve el valor Falso Positivo de la Matrix de Confusión
     * @access public
     * @return int Falso Positivo
     */
    public function getFalsePositive() {
        return $this->_fp;
    }

    /**
     * Devuelve el valor Falso Negativo de la Matrix de Confusión
     * @access public
     * @return int Falso Negativo
     */
    public function getFalseNegative() {
        return $this->_fn;
    }

    /**
     * Devuelve la métrica de sensibilidad
     */
    public function getSensitivity() {
        $divisor = $this->_tp + $this->_fn;
        return ($divisor > 0) ? round($this->_tp / $divisor, 4) : "";
    }

    /**
     * Devuelve la métrica de especificidad
     */
    public function getSpecificity() {
        $divisor = $this->_fp + $this->_tn;
        return ($divisor > 0) ? round($this->_tn / $divisor, 4) : "";
    }

    /**
     * Devuelve la métrica de precisión
     */
    public function getPrecision() {
        $divisor = $this->_tp + $this->_fp;
        return ($divisor > 0) ? round($this->_tp / ($divisor), 4) : "";
    }

    /**
     * Devuelve la métrica de exactitud
     */
    public function getAccuracy() {
        $divisor = $this->_tp + $this->_fp + $this->_tn + $this->_fn;
        return ($divisor > 0) ? round(($this->_tp + $this->_tn) / $divisor, 4) : "";
    }

    /**
     * Devuelve la métrica de F1 Score
     */
    public function getF1Score() {
        $divisor = 2 * $this->_tp + $this->_fp + $this->_fn;
        return ($divisor > 0) ? round((2 * $this->_tp) / $divisor, 4) : "";
    }

    /**
     * Devuelve la métrica de Exhaustividad (Recall)
     */
    public function getRecall() {
        $divisor = $this->_tp + $this->_fn;
        return ($divisor > 0) ? round($this->_tp / $divisor, 4) : "";
    }

}
