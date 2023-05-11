<?php
function desinfect($str) {
    $str1 = strip_tags($str);
    $str2 = preg_replace('/\x00|<[^>]*>?/', '', $str1);
    $str3 = str_replace(["'", '"'], ['&#39;', '&#34;'], $str2);
    $str4 = htmlspecialchars($str3);
    return $str4;
}
