<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/style.css"/>
    <title>Refazendo o Twitter</title>
</head>
<body>
    
    <header>
        <a href="<?php echo BASE_URL; ?>"> RFTwitter </a>
    </header>
    <div class="barra">
            <nav>
    
                <a href="<?php echo BASE_URL; ?>"><div class="link">Página Inicial</div></a>
                <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $_SESSION['twlg']?>"><div class="link"><img src="<?php echo BASE_URL; ?>Images/thumb/<?php echo $data['thumb'];?>" width=60 height=40><?php echo $data['nome']; ?> </div></a>
                
            </nav>
    </div>
    <div class="main">

        <?php $this->loadViewInTemplate($view, $data); ?>
        
    </div>
    
    
  

        

</body>
</html>






