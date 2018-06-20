<html>
<head>
    <title>Капча</title>
</head>
<body>
    <h2>Введите код с картинки</h2>
      <form method="post" action="formcaptcha.php"/>
        <img src="captcha.php" />
        <br>
        <br>
        <input class="input" type="text" name="norobot" />
        <br>
        <br>
        <input type="submit" name="captcha" value="Ввести" />
      </form>
</body>
</html>
<?php
    require_once 'function.php';
    if (isset($_POST['captcha'])) {
        if ($_POST['norobot'] != $_SESSION['random']) {
            file_put_contents('capcha.txt', '1', FILE_APPEND);
            echo "Не верный код";
            $capcha = file_get_contents("capcha.txt");
            if (strlen($capcha) > 2) {
                unlink('capcha.txt');
                redirect('rest');
            }
        }else {
            if (file_exists('capcha.txt')){
                unlink('capcha.txt');
            }
            echo "Отлично , кажется, что вы не робот";
            redirect('index');
        }
    }

?>