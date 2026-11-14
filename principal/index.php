<?php
/*
----------------------
Menu inicial
----------------------
*/



include 'bancoDados.php';

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

#vamos usar para nao passar por parametro nome dos scripts
$listaScripts = [
 "novaGravacao" => "novaGravacao.php"
, "consultarGravacoes" =>  "consultarGravacoes.php"
, "cargaGravacao" =>  "cargaGravacao.php"
];

#conecao com banco de dados
$dbh=ConectarBancoDados();


#testando querys

#teste select 01
/*
$query="SELECT * FROM genero";

$resultadoQuery=$dbh->query($query);


$teste = $resultadoQuery->fetch_object();

echo "{$teste->nome}";
*/
$query="SELECT * FROM genero";

$respostaAtual=ExecutaQuery($dbh,$query);



echo<<< Bloco
 <html>
  <head>
     <meta charset=\"utf-8\">
    <title>Controle Gravações</title>
    <link rel=\"stylesheet\" href=\"styles.css\" />

     <script src=\"script.js\">    </script>
     <script>
       function irParaOutrosScripts(script){
           document.location="./"+script;

       }
     </script>
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
        width: 13.2rem;

    }

       </style>
  </head>
  <body>
     <main class='menuTabela'>
      <center>
        <div class=\"TituloPrincipal\">Tela de Navegação </div>

         <p>
             Organize seus videos tendo controle de pesquisa aqui

         </p>



       <form name='formulario'>
       <div class='Conteiner_Navegacao_Botoes'>
          <input type='button'  class='BotaoDesign' name='TelaConsulta' value='Consultar Gravações' class='BotaoNavegacao' onclick="irParaOutrosScripts('consultarGravacoes.php')">
          <br>
          <br>
          <input type='button' class='BotaoDesign' name='TelaCadastro' value="Cadastrar nova Gravação" onclick="irParaOutrosScripts('novaGravacao.php')" class='BotaoNavegacao'>
           <br>
           <br>
          <input type='button' class='BotaoDesign' name='TelaCadastrarMusica' value="Tela de Cadastro Musica" onclick="irParaOutrosScripts('TelaCadastroMusica.php')" class='BotaoNavegacao'>
           <br>
           <br>
          <input type='button' class='BotaoDesign' name='TelaCadastrarArtista' value="Tela de Cadastro Artista/Banda" onclick="irParaOutrosScripts('TelaCadastroArtista.php')" class='BotaoNavegacao'>
           <br>
           <br>
          <input type='button' class='BotaoDesign' name='TelaCadastrarArtista' value="Tela de Cadastro Genero" onclick="irParaOutrosScripts('TelaCadastroGenero.php')" class='BotaoNavegacao'>
           <br>

           <br>
        </div>
        </form>


     </center>
    </main>

  </body>
 </html>

 Bloco;

?>