

<aside>
    Seguindo: <?php echo $qt_seguindo;?> <br>
    Seguidores: <?php echo $qt_seguidores;?><br><br>
    <hr>
    <a href="<?php echo BASE_URL?>login/sair">Sair</a>
</aside>
<br><br>

<div class="container">
   Página Inicial<br>
    
    <div class="box">
        <form method="post">
            <textarea name="msg" rows="4" cols="75"></textarea><br>
            <button>Enviar</button>
        </form>
    </div>
</div>
<div class="container divisao"></div>
<div class="container">
    <?php foreach ($feed as $item): ?>
        <strong>
            <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $item['id_usuario']?>    ">
                <?php if (!empty($item['url'])) :?>
                    <img src="<?php echo BASE_URL; ?>Images/thumb/<?php echo $item['url']; ?>" width=60 height=40>
                <?php else: ?>
                    <img src="<?php echo BASE_URL; ?>Images/thumb/default.jpg" width=60 height=40>
                <?php endif; ?>
        
                <?php echo $item['nome']; ?> 
                
                </a>
            
    </strong><br>
        <?php echo $item['mensagem']; ?>
        <hr>
    <?php endforeach; ?>
</div>

<div class="sugestoes">
    <h4>Sugestões de Amigos</h4>
    <hr>
    <?php foreach($sugestao as $usuario): ?>
        <td><a href="<?php echo BASE_URL; ?>/perfil/mostrar/<?php echo $usuario['id']; ?>"><?php echo $usuario['nome']; ?></a></td>
        <tr>
            <?php if($usuario['seguido'] == 0): ?>
                <a href="home/seguir/<?php echo $usuario['id']; ?>  "> [Seguir] </a>
            <?php else: ?>
                <a href="home/unfollow/<?php echo $usuario['id']; ?>"> [Unfollow]</a>
            <?php endif; ?>
        </tr>
    <?php endforeach ?>
</div>

