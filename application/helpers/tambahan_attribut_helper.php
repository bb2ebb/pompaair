<?php

function tambahan_attribut($param) {
    $str = "";
    foreach ($param as $key => $value) {
        if ($value == "js") {
            $str = $str . "<script type=\"text/javascript\" src=\"$key\"></script>\n";
        } else if ($value == "css") {
            $str = $str . "<link rel=\"stylesheet\" href=\"$key\" type=\"text/css\">\n";
        } else if ($value == "script") {
            $str = $str . "<script type=\"text/javascript\">$key</script>\n";
        }
    }
    return $str;
}


?>
