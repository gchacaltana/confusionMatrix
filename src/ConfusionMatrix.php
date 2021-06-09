<?php

/**
 * ConfusionMatrix
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@outlook.com>
 * @version v1.0.0
 * @access public
 */

namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConfusionMatrix extends SymfonyCommand {

    /**
     * @var InputInterface input
     */
    private $_input;

    /**
     * @var OutputInterface output
     */
    private $_output;

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

    public function __construct() {
        parent::__construct();
    }

    protected function main(InputInterface $input, OutputInterface $output) {
        $this->_input = $input;
        $this->_output = $output;
        $this->_displayHead();
        $this->_setAttributes();
        $this->_displayAttributes();
        $this->_displayMetrics();
    }

    private function _displayHead() {
        $this->_output->writeln([
            '',
            '**** Matriz de Confusión ****',
            '*****************************'
        ]);
    }

    private function _setAttributes() {
        $this->_tp = intval($this->_input->getArgument('tp'));
        $this->_tn = intval($this->_input->getArgument('tn'));
        $this->_fp = intval($this->_input->getArgument('fp'));
        $this->_fn = intval($this->_input->getArgument('fn'));
    }

    private function _displayAttributes() {
        $this->_output->writeln([
            '',
            'TP: Verdadero Positivo = ' . $this->_tp,
            'TN: Verdadero Negativo = ' . $this->_tn,
            'FP: Falso Positivo = ' . $this->_fp,
            'FN: Falso Negativo = ' . $this->_fn,
        ]);
    }

    private function _displayMetrics() {
        $this->_output->writeln([
            '',
            'Sensitivity = ' . $this->_getSensitivity(),
            'Specificity = ' . $this->_getSpecificity(),
            'Precision = ' . $this->_getPrecision(),
            'Accuracy = ' . $this->_getAccuracy(),
            'F1 Score = ' . $this->_getF1Score(),
        ]);
    }

    /**
     * Devuelve la métrica de sensibilidad
     */
    private function _getSensitivity() {
        return round($this->_tp / ($this->_tp + $this->_fn), 4);
    }

    /**
     * Devuelve la métrica de especificidad
     */
    private function _getSpecificity() {
        return round($this->_tn / ($this->_fp + $this->_tn), 4);
    }

    /**
     * Devuelve la métrica de precisión
     */
    private function _getPrecision() {
        return round($this->_tp / ($this->_tp + $this->_fp), 4);
    }

    /**
     * Devuelve la métrica de exactitud
     */
    private function _getAccuracy() {
        return round(($this->_tp + $this->_tn) / ($this->_tp + $this->_fp + $this->_tn + $this->_fn), 4);
    }

    /**
     * Devuelve la métrica de F1 Score
     */
    private function _getF1Score() {
        return round((2 * $this->_tp) / (2 * $this->_tp + $this->_fp + $this->_fn), 4);
    }

}
