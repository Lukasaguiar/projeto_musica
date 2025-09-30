
<?php

function ConectarBancoDados(){

// Definir as credenciais de acesso ao banco de dados
$host = "localhost";
$username = "root";
$password = "12345";
$dbname = "controle_gravacoes";

// Criar a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

#echo "Conexão bem-sucedida com o MySQL";

// Fechar a conexão
return $conn;


}



?>