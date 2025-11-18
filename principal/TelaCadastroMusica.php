<?php

/*
----------------------
Script que
cadastra novas Musicas
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

function TelaCadastro(){

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

    }

       </style>
       <script>
         function GravarDados(){
         alert('aaaa');
           var formulario=document.forms[0];
           formulario.operacao.value='GravarDados';
           formulario.submit();
         }
       </script>

       <script>
           function irParaOutrosScripts(script){
               document.location="./"+script;

           }
         </script>


    </head>
    <body>
    <center>


    <div class='menuTabela'>
    <form name='formulario' action='./novaGravacao.php' method='post'>
    <table>
     <tr>
       <td colspan='3' class='cabecaTabela'>Cadastrar Musica </td>
     </tr>
     <tr>
        <td>Nome Musica:<input type='text' name='nome'></td>
     </tr>

     <tr>
       <td>Genero: <input type='button' name='genero' value ='Clicar Aqui'></td>
    </tr>

       <tr>
      <td >Artista: <input type='button' name='Artista' value ='Clicar Aqui'></td>
    </tr>


    </table>

    <br>
    <input type='button' class='BotaoDesign' value='Retornar'  onClick="irParaOutrosScripts('index.php')">
    <input type='hidden' name='operacao'>
    <input type='button' class='BotaoDesign' value='Enviar' onClick="GravarDados()">
    </form>
    </div>

     </center>
    </body>
    </html>
Bloco;


}


 function GravarDados(){
 echo "entrou";
 }


 if($operacao == ''){

  TelaCadastro();
 }elseif($operacao =='GravarDados'){

 GravarDados();

 }





?>



