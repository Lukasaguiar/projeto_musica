<?php
/*
----------------------
Menu inicial
----------------------
*/



include 'bancoDados.php';


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
$query="SELECT * FROM genero";

$resultadoQuery=$dbh->query($query);


$teste = $resultadoQuery->fetch_object();

echo "{$teste->nome}";

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

  </head>
  <body>
     <main>
      <center>
        <div class=\"TituloPrincipal\">Tela de Navegação </div>

         <p>
             Organize seus videos tendo controle de pesquisa aqui

         </p>


       <br>
       <form name='formulario'>
       <div class='Conteiner_Navegacao_Botoes'>
          <input type='button' name='TelaConsulta' value='Consultar Gravações' class='BotaoNavegacao' onclick="irParaOutrosScripts('consultarGravacoes.php')">
          <input type='button' name='TelaCadastro' value="Casdastrar nova Gravação" onclick="irParaOutrosScripts('novaGravacao.php')" class='BotaoNavegacao'>
          <input type='button' name='TelaCadastrarMusica' value="Tela de Cadastro Musica" onclick="irParaOutrosScripts('TelaCadastroMusica.php')" class='BotaoNavegacao'>
          <input type='button' name='TelaCadastrarArtista' value="Tela de Cadastro Artista/Banda" onclick="irParaOutrosScripts('TelaCadastroArtista.php')" class='BotaoNavegacao'>
          <input type='button' name='TelaCadastrarArtista' value="Tela de Cadastro Genero" onclick="irParaOutrosScripts('TelaCadastroGenero.php')" class='BotaoNavegacao'>
          <input type='button' name='TelaCarga' value="Tela de Carga de Gravações" onclick="irParaOutrosScripts('cargaGravacao.php')" class='BotaoNavegacao'>
        </div>
        </form>


     </center>
    </main>

  </body>
 </html>

 Bloco;

?>