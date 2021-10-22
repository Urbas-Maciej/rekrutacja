<?php
    $zawartoscStrony = new SimpleXMLElement(file_get_contents("https://dlabystrzakow.pl/xml/produkty-dlabystrzakow.xml"));
    $json = json_encode($zawartoscStrony);
    return($json);
?>
