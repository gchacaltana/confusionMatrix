<?php

declare(strict_types = 1);
/**
 * ConfusionMatrixCommand
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
use Console\ConfusionMatrix;

class ConfusionMatrixCommand extends SymfonyCommand {

    /**
     * @var InputInterface input
     */
    private $_input;

    /**
     * @var OutputInterface output
     */
    private $_output;

    /**
     * @var object ConfusionMatrix
     */
    private $_confusionMatrix = NULL;

    public function configure() {
        $this->setName('main')
                ->setDescription('Matriz de Confusión.')
                ->setHelp('Este comando te permite calcular y mostrar las métricas de una matriz de confusión')
                ->addArgument('tp', InputArgument::REQUIRED, 'TP = Verdadero Positivo.')
                ->addArgument('tn', InputArgument::REQUIRED, 'TN = Verdadero Negativo.')
                ->addArgument('fp', InputArgument::REQUIRED, 'FP = Falso Positivo.')
                ->addArgument('fn', InputArgument::REQUIRED, 'FN = Falso Negativo.');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        try {
            $this->_input = $input;
            $this->_output = $output;
            $this->_displayHead();
            $this->_setAttributes();
            $this->_displayAttributes();
            $this->_displayMetrics();
        } catch (\ErrorException $ex) {
            $output->writeln($ex->getMessage());
        }
    }

    private function _displayHead() {
        $this->_output->writeln([
            '',
            '**** Matriz de Confusión ****',
            '*****************************'
        ]);
    }

    private function _setAttributes() {
        $tp = intval($this->_input->getArgument('tp'));
        $tn = intval($this->_input->getArgument('tn'));
        $fp = intval($this->_input->getArgument('fp'));
        $fn = intval($this->_input->getArgument('fn'));
        $this->_confusionMatrix = new ConfusionMatrix($tp, $tn, $fp, $fn);
    }

    private function _displayAttributes() {
        $this->_output->writeln([
            '',
            'TP: Verdadero Positivo = ' . $this->_confusionMatrix->getTruePositive(),
            'TN: Verdadero Negativo = ' . $this->_confusionMatrix->getTrueNegative(),
            'FP: Falso Positivo = ' . $this->_confusionMatrix->getFalsePositive(),
            'FN: Falso Negativo = ' . $this->_confusionMatrix->getFalseNegative()
        ]);
    }

    private function _displayMetrics() {
        $this->_output->writeln([
            '',
            'Sensitivity = ' . $this->_confusionMatrix->getSensitivity(),
            'Specificity = ' . $this->_confusionMatrix->getSpecificity(),
            'Precision = ' . $this->_confusionMatrix->getPrecision(),
            'Accuracy = ' . $this->_confusionMatrix->getAccuracy(),
            'F1 Score = ' . $this->_confusionMatrix->getF1Score(),
            'Recall = ' . $this->_confusionMatrix->getRecall()
        ]);
    }

}
