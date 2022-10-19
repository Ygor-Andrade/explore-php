<?php 
 
// phpinfo(); 
// Recebe os campos dos formulário

$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha  = $_POST['senha'];
$idade  = $_POST['idade'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$destinos = $_POST['destinos'];
$hospedagens = $_POST['hospedagem']; 
$mensagem = $_POST['mensagem'];
$dt_cadastro = date;


//Para investigar 
// var_dump($_POST);

// coencta ao banco e grava os dados (insert com PDO)

try {
        //instancia o banco por meio do PDO
    $pdo = new PDO('mysql:host=localhost;dbname=explore','root' ,'');

//Insert na tabela users

$sql = $pdo->prepare('INSERT into users (nome, email, sexo, telefone, senha, idade, estado, cidade, destinos, 
hospedagem, mensagem, dt_cadastro)
values(:nome, :email, :sexo, :telefone, :senha, :idade, :estado, :cidade, :destinos, 
:hospedagem, :mensagem, :dt_cadastro)');
$sql->execute(array(
':nome'  => $nome,
':email' => $email,  
':sexo ' => $sexo,
':telefone' => $telefone,
':senha' => md5($senha),
':idade' => $idade,
':estado' => $estado,
':cidade' => $cidade,
':destinos' => $destinos,
':hospedagem' => $hospedagem,
':mensagem' => $mensagem,
':dt_cadastro' => $dt_cadastro,
));

echo '<h1>Usuário cadastrado</h1>';
var_dump($_POST);

} catch (PDOException $erro) {
    //se der erro, exibe o erro aqui
echo $erro;

}
