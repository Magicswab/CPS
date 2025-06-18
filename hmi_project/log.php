<?php
function log_event($msg) {
    $logfile = 'log.txt';
    $timestamp = date("Y-m-d H:i:s");
    $log_entry = "[$timestamp] $msg\n";
    file_put_contents($logfile, $log_entry, FILE_APPEND);
}
?>
