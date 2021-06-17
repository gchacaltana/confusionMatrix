#!/usr/bin/env php
<?php
declare(strict_types = 1);

/**
 * Aplicación de consola: Matriz de Confusión
 *
 * Execution: ./App.php main <TP> <TN> <FP> <FN>
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@outlook.com>
 * @version v1.0.0
 * @access public
 */
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\ConfusionMatrixCommand;

$app = new Application('Matriz de Confusión', 'v1.0.0');
$app->add(new ConfusionMatrixCommand());
$app->run();
