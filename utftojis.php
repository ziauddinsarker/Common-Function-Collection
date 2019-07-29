<?php 

$str="u5f62u5f0fu304cu9593u9055u3063\u3066\u3044\u308b\u5834\u5408";

$str = mb_convert_encoding($str, "UTF-8", "SJIS");
echo $str;