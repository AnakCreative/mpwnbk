<?php
//-- function highlight searching --//
function highlight($text, $words){
    preg_match_all('~[A-Za-z0-9_äöüÄÖÜ]+~', $words, $m);
    if (!$m)
        return $text;
    $re = '~(' . implode('|', $m[0]) . ')~i';
    return preg_replace($re, '<em style="color:red !important;">$0</em>', $text);
}