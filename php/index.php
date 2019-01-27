<?php echo"HI";?>
<?php

$command = escapeshellcmd('python3 hello.py');
$output = shell_exec($command);
echo $output;

?>
