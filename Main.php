<?php
require_once('./Check.php');
echo'///STRT///'.PHP_EOL;;
Check::run();
exec('find ./source/ -name *_errors.txt > output.txt');
echo'///FINISH///';
