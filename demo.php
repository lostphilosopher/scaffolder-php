<?php

include('writer.php');

$writer = new writer('test.php','controller');

$msg = $writer->make();

return $msg;

?>
