<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: index.php');
    exit;
}
$xml = new DOMDocument;
$xml->load('dogs.xml');

$xsl = new DOMDocument;
$xsl->load('dogs.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>
