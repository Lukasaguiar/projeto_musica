<?php

/*
----------------------
Script que
lista gravacoes
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


function MontaTela(){





echo <<< Bloco
 <!DOCTYPE html>
 <html>
  <head>
     <meta charset="utf-8">
    <title>Controle Gravações</title>
    <link rel="stylesheet" href="styles.css" />

       <script>
           function irParaOutrosScripts(script){
               document.location="./"+script;

           }
         </script>

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
        width: 12rem;

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
  </head>
  <body class='menuTabela'>
     <main>
      <center>
        <div class="TituloPrincipal">Tela de Consulta de gravações </div>

         <p>
            Veja suas gravações já cadastradas no sistema

         </p>
 <table>
Bloco;

    global $dbh;

 $query="SELECT link_gravacao.url
                ,link_gravacao.is_youtube
                ,gravacao.nome
            FROM gravacao
             INNER JOIN link_gravacao
              ON gravacao.link_gravacao_chave = link_gravacao.chave
          WHERE 1=1 ";

 $respostaAtual=ExecutaQuery($dbh,$query);

  while ($row = $respostaAtual->fetch_assoc() ) {
            $urlAtual=$row['url'];
            $isYoutube=$row['is_youtube'];
            $nomeGravacao=$row['nome'];


$urlMiniPlayer="$urlAtual";

#i ignora faz n ser case sensitive
$urlMiniPlayer = preg_replace('/watch\?v\=/i', 'embed/', $urlMiniPlayer);
$urlMiniPlayer = preg_replace('/youtu.be/', 'www.youtube.com', $urlMiniPlayer);


#vamos checar se existe o campo embed. senao. botamos

if(!(preg_match('/embed/', $urlMiniPlayer))){

$urlMiniPlayer = preg_replace('/www.youtube.com\//', 'www.youtube.com/embed/', $urlMiniPlayer);

}

#se for um short. o tratament o é diferente

if((preg_match('/shorts/', $urlMiniPlayer))){

$urlMiniPlayer = preg_replace('/youtube.com\/shorts/', 'www.youtube.com/embed/', $urlMiniPlayer);

}

#//$urlMiniPlayer="https://www.youtube.com/embed/LLMI2wykMzU";


  $urlAtual="https://www.youtube.com/embed/zWboOvA1onI";
#// para mostrar os videos do youtube no nosso site aqui precisamos mostrar a url
#//    src="https://www.youtube.com/embed/oEy9sf9COes" usamos esse /embed/
#// caso querermos abrir so o video no youtube podemos com esse embed ou  watch
#//
  echo <<< Bloco

   <tr>
     <td>
       <iframe class="ajuda-play"  src="$urlMiniPlayer" frameborder="0"
           width="400px" height="200px" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
           allowfullscreen>
       </iframe>
     </td>
       </tr>
    </tr>
       <td align='middle'> <a href="$urlAtual" target="_blank"> $nomeGravacao </a> </td>
    <tr>



Bloco;

  }




echo <<< Bloco



             </table>



       <br>
       <div class='Conteiner_Navegacao_Botoes'>
           <input type='button' class='BotaoDesign' name='RetornarMenu' value="Retornar" onClick="irParaOutrosScripts('index.php')" class='BotaoNavegacao'>
        </div>


     </center>
    </main>

  </body>
 </html>
Bloco;



}

/*
  <tr>
     <td>
                   <iframe class="ajuda-play"
                       src="https://www.youtube.com/embed/-id7d1wtIEE"
                         frameborder="0"
                          width="400px" height="200px"
                         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                         allowfullscreen></iframe>
                   </td>


                   <td>
                   <iframe class="ajuda-play"
                       src="https://www.youtube.com/embed/-id7d1wtIEE"
                         frameborder="0"
                         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                         allowfullscreen></iframe>
   </td>

  </tr>




*/

if ($operacao == ''){
    MontaTela();
}

?>
