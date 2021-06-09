#!/usr/bin/env php
<?php
/**
 * Aplicación
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@outlook.com>
 * @version v1.0
 * @access public
 */
require_once __DIR__ . '/vendor/autoload.php';

class App {

    /**
     * @var int True Positive. Verdadero Positivo
     * @access private
     */
    private $_tp;

    /**
     * @var int True Negative. Verdadero Negativo
     * @access private
     */
    private $_tn;

    /**
     * @var int False Positive. Falso Positivo
     * @access private
     */
    private $_fp;

    /**
     * @var int False Negative. Falso Negativo
     * @access private
     */
    private $_fn;

    public function __construct() {
        $this->_tp = 0;
        $this->_tn = 0;
        $this->_fp = 0;
        $this->_fn = 0;
    }

    public function run() {
        print "main";
    }

}

$app = new App();
$app->run();
