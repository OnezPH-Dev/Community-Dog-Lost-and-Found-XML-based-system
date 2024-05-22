<!-- list_users.php -->
<?php
$xml = new DOMDocument;
$xml->load('users.xml');

$xsl = new DOMDocument;
$xsl->load('users.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>
