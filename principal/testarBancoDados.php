<?php
/*
----------------------
Testar banco de dados
----------------------
*/



include 'bancoDados.php';

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
    <title>Testar Banco de dados </title>
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
        <div class=\"TituloPrincipal\">Testar Banco de dados </div>

         <p>
             Organize seus videos tendo controle de pesquisa aqui

         </p>


       <br>
       <form name='formulario'>
       <div class='Conteiner_Navegacao_Botoes'>
           <input type='button' name='RetornarMenu' value="Retornar Menu Principal" onClick="irParaOutrosScripts('index.php')" class='BotaoNavegacao'>
        </div>
        </form>


     </center>
    </main>

  </body>
 </html>

 Bloco;

?>