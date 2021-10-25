<?php

namespace code;

include_once '../library/src/code/StringChecker.php';
$filePath = (string)$argv[1];
$debugMode = (int)$argv[2];
$handle = fopen($filePath, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        try {
        $checker = new StringChecker($line, $debugMode);
        $checkResult = $checker->stringCheck();
        if ($checkResult) {
            echo " String: $line is correct!\n";
        } else {
            echo " String: $line has mistakes!\n";
        }
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
        }
    }
    fclose($handle);
} else {
    echo 'File doesn`t exists in the path: ' . $filePath;
}

