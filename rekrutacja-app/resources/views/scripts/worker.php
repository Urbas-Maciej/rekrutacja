<?php
    try{
        // Proóba pobrania zasobów ze strony `htps://dlabystrzakow.pl/xml/produkty-dlabystrzakow.xml`...
        $zawartoscStrony = new SimpleXMLElement(file_get_contents("htps://dlabystrzakow.pl/xml/produkty-dlabystrzakow.xml"));

        // Przekształcenie pobranyh danych do formatu `.json` oraz ich poźniejsze zwrócenie...
        $json = json_encode($zawartoscStrony);
        return($json);
    }
    catch(Exception $e) {
        echo(
            "Nie udało się pobrać zasobów ze strony `https://dlabystrzakow.pl/xml/produkty-dlabystrzakow.xml` <br>" .
            "Wystąpiły błedy: " . $e->getMessage() . "<br>"
        );


        try {
            echo(
                "<br>" .
                "Nasępuje próba pobrania zasobów lokalnych... <br>"
            );

            // Próba pobrania zasobów znajdujących się na serwerze...
            $localPath = env('ROOTUPII');
            $zawartoscStronyStr = file_get_contents($localPath);
            $zawartoscStrony = new SimpleXMLElement($zawartoscStronyStr);

            // Przekształcenie pobranyh danych do formatu `.json`...
            $json = json_encode($zawartoscStrony);

            echo(
                "Udało się załadować plik XML i przekształcić go na format .json <br> <br>"
            );

            // Zwrócenie sformatowanych wartości...
            return($json);
        }
        catch(Exception $e) {
            echo(
                "Wystąpiły błedy: " . $e->getMessage() . "<br>"
            );
        }
    }
?>
