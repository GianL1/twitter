<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>/Assets/css/style.css"/>
    <title>Refazendo o Twitter</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="<?php echo BASE_URL; ?>"> RFTwitter </a>
        </div>
        <div class="user">
            <img src="<?php echo BASE_URL; ?>Images/thumb/<?php echo $data['thumb'];?>" width=60 height=40>
            <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $_SESSION['twlg']?>"><?php echo $data['nome']; ?></a>
        </div>
        
    </header>
    

    <div class="container">
        <?php $this->loadViewInTemplate($view, $data); ?>
    </div>
</body>
</html>






