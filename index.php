<?php
    require_once 'function.php';
    require_once 'resttrue.php';
    if (!empty($_POST)) {
        if (login($_POST['login'],$_POST['password'])) {
            $_SESSION['test']=$_POST['login'];
            $_SESSION['name']=$_POST['login'];
            $_SESSION['passwordadmin']=$_POST['password'];
            redirect('test');
            die;
        }
        if ($_POST['login']&&empty($_POST['password'])){
            $_SESSION['login']=$_POST['login'];
            $_SESSION['name']=$_POST['login'];
            redirect('quest');
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Авторизация</h1>

                    <form method="POST">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" placeholder="Логин" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password" placeholder="Пароль" name="password" id="key" class="form-control">
                        </div>
                        <input type="submit" id="btn-login" name="accept" class="btn btn-success btn-lg btn-block" value="Войти">
                    </form>
<?php
    if (!empty($_POST['accept'])) {
        if ($_POST['password'] != $_SESSION['validate']) {
            file_put_contents('session.txt', '1',FILE_APPEND);
            echo "Не верный пароль";
            $session = file_get_contents("session.txt");
                if (strlen($session) > 2){
                    unlink("session.txt");
                    redirect('formcaptcha');
                }
        }
    }
    file_put_contents('temp.txt',null);
    file_put_contents('temp1.txt',null);
    file_put_contents('temp2.txt',null);
 ?>
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</body>
</html>
