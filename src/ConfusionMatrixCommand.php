<?php

/**
 * ConfusionMatrixCommand
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@outlook.com>
 * @version v1.0.0
 * @access public
 */

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\ConfusionMatrix;

class ConfusionMatrixCommand extends ConfusionMatrix {

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
        $this->main($input, $output);
    }

}
