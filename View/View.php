<?php
class View{
    //ATTRIBUT
    
    //CONSTRUCT

    //GETTER ET SETTER

    //METHODS
    public function displayHeader():self{
        $head ="";
        $head .='
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
        <body>';
        echo $head;
            return $this;
    }
    public function displayFooter(): self{
        $foot ="";
        $foot .='
        </body>
        </html>';
        echo $foot;
        return $this;
    }
}