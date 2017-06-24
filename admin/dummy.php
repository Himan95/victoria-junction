<?php

$date_format= 'Y-m-d';
$from=date('Y-m-d');
$today=strtotime('now');
$yesterday=strtotime('-1 day',$today);
$to=gmdate($date_format,$yesterday);
 ?>
