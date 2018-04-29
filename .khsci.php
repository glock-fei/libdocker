<?php

// First Edit config

const GIT_URL = 'https://github.com';
const GIT_USERNAME = 'khs1994-docker';
const GIT_REPO = 'libdocker';
const STYLECI_ID = 119828346;
const COMPOSER_PROJECT='khs1994/docker';
const COMPOSER_DESCRIPT='A PHP library for the Docker Engine API ';

if ($fh = opendir(__DIR__)) {
    while (false !== ($file = readdir($fh))) {
        if ('.' === $file or '..' === $file or is_dir($file) or '.khsci.php' === $file) {
            continue;
        }
        // echo $file.PHP_EOL;
        $content = file_get_contents($file);
        $content = str_replace('{{ EXAMPLE_GIT_URL_EXAMPLE }}', GIT_URL, $content);
        $content = str_replace('{{ EXAMPLE_GIT_USERNAME_EXAMPLE }}', GIT_USERNAME, $content);
        $content = str_replace('{{ EXAMPLE_GIT_REPO_EXAMPLE }}', GIT_REPO, $content);
        $content = str_replace('{{ EXAMPLE_STYLECI_ID_EXAMPLE }}', STYLECI_ID, $content);
        $content = str_replace('{{ EXAMPLE_COMPOSER_PROJECT_EXAMPLE }}', COMPOSER_PROJECT, $content);
        $content = str_replace('{{ EXAMPLE_COMPOSER_DESCRIPT_EXAMPLE }}', COMPOSER_DESCRIPT, $content);
        file_put_contents($file, $content);
    }
    closedir($fh);
}
