<?php
function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}

$currentDirectory = getcwd();

echo "Current directory: $currentDirectory\n";

function goToBaseDirectory() {
    while (true) {
        $currentDirectory = getcwd();
        if ($currentDirectory == '/') {
            break; // We're already at the base directory
        }
        chdir('..');
    }
}

goToBaseDirectory();

$newDirectory = getcwd();

echo "Base directory: $newDirectory\n";

var_dump(getDirContents('./'));
?>
