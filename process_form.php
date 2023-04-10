<?php
if(isset($_POST['email'])) {

  // Edite as linhas abaixo para inserir seu endereço de e-mail e o assunto da mensagem
  $email_to = "suhamy_rs@yahoo.com";
  $email_subject = "Contato - S.R. Contabilidade - Sou visitante do site";

  function died($error) {
    // mensagem de erro caso haja algum problema com o envio do formulário
    echo "Houve um problema no envio do formulário. ";
    echo "Os seguintes erros ocorreram:<br><br>";
    echo $error."<br><br>";
    echo "Por favor, volte e corrija-os.<br><br>";
    die();
  }

  // Validação dos campos do formulário
  if(!isset($_POST['name']) ||
      !isset($_POST['email']) ||
      !isset($_POST['message'])) {
    died('Houve um erro ao enviar o formulário. Por favor, volte e tente novamente.');
  }

  $nome = $_POST['name'];
  $email = $_POST['email'];
  $mensagem = $_POST['message'];

  $email_message = "Detalhes do formulário abaixo.\n\n";

  function limpa_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Nome: ".limpa_string($name)."\n";
  $email_message .= "E-mail: ".limpa_string($email)."\n";
  $email_message .= "Mensagem: ".limpa_string($message)."\n";

  // cria os cabeçalhos do e-mail
  $headers = 'From: '.$email."\r\n".
  'Reply-To: '.$email."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  // envia o e-mail
  mail($email_to, $email_subject, $email_message, $headers);
?>
  
<!-- Mensagem de sucesso que será exibida após o envio do formulário -->
<p>Obrigado por entrar em contato. Responderemos assim que possível.</p>

<?php
} else {
  died('Houve um erro ao enviar o formulário.
