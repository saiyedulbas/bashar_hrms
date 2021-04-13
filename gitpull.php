<?php

function execPrint($command)
{
    $result = array();
    exec($command, $result);
    print("<pre>");
    foreach ($result as $line) {
        print($line . "\n");
    }
    print("</pre>");
}
// Print the exec output inside of a pre element
execPrint("git pull https://razibthedev:R2z1bH2s2n@bitbucket.org/razibthedev/ulkasemi-hrms.git master 2>&1");
//execPrint('git pull 2>&1');
//execPrint("git status");
