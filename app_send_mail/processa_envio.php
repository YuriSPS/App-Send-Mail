<?php


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // print_r($_POST);

    class Mensagem {
        //atributos
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array('codigo_status' => null, 'descricao_status' => '');

        //metodos
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function mensagemValida() {
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
                return false;
            }

            return true;
        }
    }

    $mensagem = new Mensagem();

    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);

    
    if( !$mensagem->mensagemValida() ) {
        echo 'Mensagem nao e valida';
        header('Location: index.php');
    } 
    $mail = new PHPMailer(true);
    try {
    //Server settings
    $mail->SMTPDebug = false;                             // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'seu_email@gmail.com';              // SMTP username
    $mail->Password = 'sua senha do email';               // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('seu_email@gmail.com', 'Nome_que_ira_aparecer_quando alguem_receber_seu_email');   // Remetente(Nosso email), em seguida nosso nome
    $mail->addAddress($mensagem->__get('para'));              // Email para quem estamos enviando(Destinatario).
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                                                       // Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');                                                  //Assunto do email
    $mail->Body    = $mensagem->__get('mensagem');                    //Corpo do email(Conteudo do email)
    $mail->AltBody = 'E necessario utilizar um client que suporte html para ter acesso total ao conteudo dessa mensagem';

    $mail->send();
    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso';

    } catch (Exception $e) {
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Nao foi possivel enviar este e-mail, tente novamente.' . '<br>Detalhes do erro: ' . $mail->ErrorInfo;    

    }
    
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>App Send Mail</title>

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
        
    <body>

        <header id="cabecalho">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <img src="logo.png" alt="" width="72" heigth="72" class="img-fluid">
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-12">
                        <h2>Send Mail</h2>
                        <p class="lead">Seu app de envio de e-mails particular!</p>
                    </div>
                </div>
            </div>
        </header>

        <section id="corpo">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">

                    <? if($mensagem->status['codigo_status'] == 1){ ?>

                        <div class="container">
                            <h1 class="display-4 text-sucess">Sucesso</h1>
                            <p class="lead"> <?= $mensagem->status['descricao_status'] ?> </p>
                            <a href="index.php" class="btn btn-lg btn-success mt-5 text-white">Voltar</a>
                        </div>
                    
                    <? } ?>

                    <? if($mensagem->status['codigo_status'] == 2){ ?>

                        <div class="container">
                            <h1 class="display-4 text-danger">Ops.. Alguma coisa deu errado =/</h1>
                            <p class="lead"> <?= $mensagem->status['descricao_status'] ?> </p>
                            <a href="index.php" class="btn btn-lg btn-danger mt-5 text-white">Voltarqqqqqqqqqqqqqqqqqqqq</a>
                        </div>

                    <? } ?>
                    </div>
                </div>
            </div>
        </section>

    </body>

</html>    