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

$query='';
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
        width: 9rem;

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
    <form name='formulario' action='./TelaCadastroGenero.php' method='post'>
    <table>
     <tr>
       <td colspan='3' class='cabecaTabela'>Cadastrar Genero </td>
     </tr>
     <tr>
        <td>Genero:<input type='text' name='nome'></td>
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

 $nomeGeneroAtual= $_POST['nome'];
 echo "gravar dados:$nomeGeneroAtual ";


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
     ]
       <script>
           function irParaOutrosScripts(script){
               document.location="./"+script;

           }
         </script>


    </head>
    <body>
    <center>


   <div >
      Operação Finalizada
   </div>
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



 function ListaGenero(){
 //preciso abrir um novo banco de dados a cada funcao. se nao nao funciona
 // ou quando for uma variavel global, indicar no codigo que a tal variavel eh global
    global $dbh;
    global $query;
/*
exemplo query
 $query="SELECT nome FROM genero";

 $respostaAtual=ExecutaQuery($dbh,$query);

  while ($row = $respostaAtual->fetch_assoc() ) {

  echo"teste:". $row["nome"];

 }
 */

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
         function TelaCadastro(){

           var formulario=document.forms[0];
           formulario.operacao.value='TelaCadastro';
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
    <form name='formulario' action='./TelaCadastroGenero.php' method='post'>
    <table>
     <tr>
       <td colspan='3' class='cabecaTabela'>Lista Genero </td>
     </tr>
     <tr>
       <td>Chave</td>
        <td>Nome</td>

     </tr>

Bloco;


 $query="SELECT chave,nome FROM genero WHERE 1=1 ";

 $respostaAtual=ExecutaQuery($dbh,$query);

  while ($row = $respostaAtual->fetch_assoc() ) {

     $chaveAtual=$row['chave'];
     $nomeAtual=$row['nome'];

  echo <<< Bloco
     <tr>
         <td>$chaveAtual </td>
         <td>$nomeAtual  </td>
     </tr>

Bloco;
 }
echo<<<Bloco
    </table>

    <br>
    <input type='button' class='BotaoDesign' value='Retornar'  onClick="irParaOutrosScripts('index.php')">
    <input type='hidden' name='operacao'>
    <input type='button' class='BotaoDesign' value='Cadastrar Novo Genero' onClick="TelaCadastro()">
    </form>
    </div>

     </center>
    </body>
    </html>
Bloco;



 }


 if($operacao == ''){

  ListaGenero();
 }else if($operacao =='GravarDados'){

 GravarDados();

 }else if($operacao =='TelaCadastro'){

 TelaCadastro();

 }





?>



