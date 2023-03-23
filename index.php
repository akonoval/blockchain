<?php

include "Blockchain.php";


$blockchain = new Blockchain();
$timeStart = microtime(true); 

$blockchain->addNewBlock('Uli', 'Stefan', 30);
$blockchain->addNewBlock('Uli', 'Christoph', 130);
$blockchain->addNewBlock('Uli', 'Bernhart', 50);

$blockchain->addNewBlock('Stefan', 'Bernhart', 10);
$blockchain->addNewBlock('Bernhart', 'Christoph', 40);
// $blockchain->addNewBlock('Christoph', 'Stefan', 10);
// $blockchain->addNewBlock('Christoph', 'Bernhart', 15);

$timeEnd = microtime(true);

print ('Execution time :' . ($timeEnd - $timeStart)) . '</br>';

$blockchain->print();

if ($blockchain->validate()) {
    echo '</br>';
    echo 'blockchain is valid'.'</br>';
} else {
    echo '</br>';
    echo 'blockchain is not valid'.'</br>';
}
echo '</br>';
echo '</br>';


