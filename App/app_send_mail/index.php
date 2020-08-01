<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
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
                        <img src="logo.png" width="72" height="72" class="img-fluid">
                    </div>
                </div>

                <div class="row text-center">
                        <div class="col-md">
                            <h2>Send Mail</h2>
                            <p class="lead">Seu app de envio de e-mails particular!</p>
                        </div>
                </div>
            </div>
        </header>

        <section id="formulario-email">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form class="form-email" action="processa_envio.php" method="post">
                                <div class="form-group">
                                    <label for="">Para</label>
                                    <input name="para" type="text" class="form-control" placeholder="joao@dominio.com.br">
                                </div>

                                <div class="form-group">
                                    <label for="">Assunto</label>
                                    <input name="assunto" type="text" class="form-control" placeholder="Assunto do e-mail">
                                </div>

                                <div class="form-group">
                                    <label for="">Mensagem</label>
                                    <textarea name="mensagem" id="mensagem" cols="10" rows="2" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>