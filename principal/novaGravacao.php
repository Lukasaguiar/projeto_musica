<?php

/*
----------------------
Script que
cadastra novas gravaçoes
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

 <script>
           function helpMusica(script){
              var caminho;
           		  caminho = './help/helpListaMusica.php?parametroChamada1=teste';

               var altura=500;
               var largura=500;
               var x=(screen.availWidth/2)-(largura/2);
               var y=(screen.availHeight/2)-(altura/2);
               var winprops='directories=no,height='+altura+',location=no,menubar=no,resizable=no,scrollbars=yes,status=no,toolbar=no,width='+largura;
               var w=window.open(caminho,'nome',winprops);
               w.focus();

           }
         </script>
    </head>
    <body>
    <center>


    <div class='menuTabela'>
    <form name='formulario' action='./novaGravacao.php' method='post'>
    <table>
     <tr>
       <td colspan='3' class='cabecaTabela'>Cadastrar Pessoa Simples </td>
     </tr>
     <tr>
        <td>Nome Gravação:<input type='text' name='nomeGravacao'></td>
     </tr>

     <tr>
       <td>Musica: <input type='button' name='musica' value ='Clicar Aqui' onCLick="helpMusica()"></td>
    </tr>

       <tr>
      <td >link gravacao: <input type='text' name='linkGravacao' size='30'> </td>
    </tr>
    <tr>
      <td >video esta no youtube:
         <input type='radio' name='isVideoYoutube' value='t' checked>sim
          <input type='radio' name='isVideoYoutube' value='f'>Não
      </td>
    </tr>

    </table>

    <br>
    <input type='button' class='BotaoDesign' value='Retornar'  onClick="irParaOutrosScripts('index.php')">
    <input type='hidden' name='operacao'>
    <input type='hidden' name='musicaChave'>
    <input type='button' class='BotaoDesign' value='Enviar' onClick="GravarDados()">
    </form>
    </div>

     </center>
    </body>
    </html>
Bloco;


}


 function GravarDados(){

  //preciso abrir um novo banco de dados a cada funcao. se nao nao funciona
  // ou quando for uma variavel global, indicar no codigo que a tal variavel eh global
     global $dbh;
     global $query;

  $nomeGravacao= $_POST['nomeGravacao'];
  $musicaChave= $_POST['musicaChave'];
  $linkGravacao= $_POST['linkGravacao'];
  $isVideoYoutube= $_POST['isVideoYoutube'];


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



 Bloco;

  #vamos começar a gravacao dos generos

 if($isVideoYoutube == 't'){
   $isVideoYoutube=1;
 }else{$isVideoYoutube=0;}

 #vamos começar a gravacao dos generos
   mysqli_begin_transaction($dbh);

 $query="INSERT INTO link_gravacao(url,is_youtube)
             VALUES('$linkGravacao',$isVideoYoutube)";
 $respostaAtual=ExecutaQuery($dbh,$query);

#pega a chave que gravamos acima
$id = mysqli_insert_id($dbh);


 $query="INSERT INTO gravacao(nome
                              ,musica_chave
                               ,link_gravacao_chave
                               ,tipo_gravacao_chave
                               )
                    VALUES('$nomeGravacao'
                            ,$musicaChave
                            ,$id
                            ,'1')";


 $respostaAtual=ExecutaQuery($dbh,$query);

  mysqli_commit($dbh);





 echo <<< Bloco


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


 if($operacao == ''){

  TelaCadastro();
 }elseif($operacao =='GravarDados'){

 GravarDados();

 }





?>



