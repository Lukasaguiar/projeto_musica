<?php

/*
----------------------
Consultar gravaçoes
----------------------
*/




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


  </head>
  <body>
     <main>
      <center>
        <div class="TituloPrincipal">Tela de Consulta de gravações </div>

         <p>
            Veja suas gravações já cadastradas no sistema

         </p>


            <div>simulando uma mas depois botaremos com jquery ou php</div>


            <table>
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


             </table>



       <br>
       <div class='Conteiner_Navegacao_Botoes'>
           <input type='button' name='RetornarMenu' value="Retornar Menu Principal" onClick="irParaOutrosScripts('index.php')" class='BotaoNavegacao'>
        </div>


     </center>
    </main>

  </body>
 </html>
Bloco;

?>
