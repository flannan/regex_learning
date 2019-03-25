<?php
/**
 * @param $url
 *
 * @return bool
 */
function validateURL($url)
{
    $valid = true;
    if (substr($url, 0, 4) !== 'http') {
        $url = 'http://' . $url;
    }
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        $valid = false;
    }

    $host = parse_url($url, PHP_URL_HOST);
    $hosts = explode('.', $host);

    foreach ($hosts as $host) {
        if (strlen($host) < 2) {
            $valid = false;
        }
        if (strpbrk($host, '_') !== false) {
            $valid = false;
        }
        if (!ctype_alnum(substr($host, 0, 1))) {
            $valid = false;
        }
        if (!ctype_alnum(substr($host, -1))) {
            $valid = false;
        }
    }
    return $valid;
}
