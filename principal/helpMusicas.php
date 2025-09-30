<?php

/*
----------------------
Script que lista muscias cadastradas no sistema
----------------------
*/



#biblioteca banco de dados
include 'bancoDados.php';
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
#conecao com banco de dados
$dbh=ConectarBancoDados();


#variaveis de controle
$operacao ="";


#recebendo dados de formularios
$operacao= ($_POST["operacao"] != '') ? $_POST["operacao"]:'';



/*
----------------------
funções do script
----------------------
*/

function TelaLista(){

echo <<< Bloco

    <!DOCTYPE html>
    <html>
    <head>
       <style>
         .cabecaTabela {
        color: Blue;
        background-color: #47d1b6;
        text-align: center;
        color: #17412eed;
    }
           .menuTabela{
          background-color: #c59e7038;
          }

          .BotaoDesign {
        background-color: #2ca9ad96;
        font-weight: bold;
        color: black;
        height: 1.8rem;
        border-radius: 5px;
        width: 9rem;

    }

       </style>



    </head>
    <body>
    <center>


    <div class='menuTabela'>
    <form name='formulario' action='./novaGravacao.php' method='post'>
    <table>
     <tr>
       <td colspan='3' class='cabecaTabela'>Helo Musicas</td>
     </tr>
     <tr>

    </tr>

    </table>

    <br>
    <input type='button' class='BotaoDesign' value='Retornar'  onClick="irParaOutrosScripts('index.php')">
    <input type='hidden' name='operacao'>
        </form>
    </div>

     </center>
    </body>
    </html>
Bloco;


}



 if($operacao == ''){
  TelaLista();
 }





?>



