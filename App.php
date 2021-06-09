#!/usr/bin/env php
<?php
/**
 * Aplicación
 *
 * Execution: ./App.php
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@outlook.com>
 * @version v1.0.0
 * @access public
 */
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\ConfusionMatrixCommand;

$app = new Application('Confusion Matrix App', 'v1.0.0');
$app->add(new ConfusionMatrixCommand());
$app->run();
