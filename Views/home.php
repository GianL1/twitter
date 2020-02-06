
<aside>
    Seguindo: <?php echo $qt_seguindo;?> <br>
    Seguidores: <?php echo $qt_seguidores;?><br><br>
    <hr>
    <a href="<?php echo BASE_URL?>login/sair">Sair</a>
</aside>


    
    <div class="main">
            <div class = "tweet-content-box">
                <form method="post" enctype="multipart/form-data" id="form-tweet">
                    <textarea name="msg" rows="1" cols="60"></textarea><br>
                    <input type="file" name="imagem_post"><br>
                    <button>Enviar</button><br>
                </form>
            </div>
        
        
        <div class="post">
            <?php foreach ($feed as $item): ?>
            
            <?php $id_curtidores = array($item['id_curtidores']); ?>
                
                    <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $item['id_usuario']?>    ">
                        <?php if (!empty($item['url'])) :?>
                            <img src="<?php echo BASE_URL; ?>Images/thumb/<?php echo $item['url']; ?>" width=60 height=40>
                        <?php else: ?>
                            <img src="<?php echo BASE_URL; ?>Images/thumb/default.jpg" width=60 height=40 >
                        <?php endif; ?>
                
                        <?php echo $item['nome']; ?> 
                        
                    </a><br><br>
                

        
            <?php echo $item['mensagem']; ?><br>
        
        
                <?php if(!empty($item['url_post'])): ?>
                    <img src="<?php echo BASE_URL; ?>Images/posts/<?php echo $item['url_post'];?>" width=500 height=300>
                <?php endif; ?>
            
                <?php if($item['id_usuario'] == $_SESSION['twlg']): ?>
                    <a href=" <?php echo BASE_URL; ?>post/delete/<?php echo $item['id'];?> " id="deletar_post">Deletar Post</a><br>
                <?php endif; ?>
                
                <?php if(!empty($item['id_curtidores']) && in_array($_SESSION['twlg'], $id_curtidores)): ?>
                    <a href="<?php echo BASE_URL?>post/descurtir/<?php echo $item[0]; ?>">Descurtir</a><br>
                <?php else: ?>
                    <a href="<?php echo BASE_URL?>post/curtir/<?php echo $item[0]; ?>">Curtir</a>
                <?php endif; ?> <br>
            
                Curtidas: <?php echo $item['curtidas']; ?><br><br><br>
 
                
                
            <?php endforeach; ?>
        </div>
    </div>

<div class="sugestoes">
    <h4>Sugestões de Amigos</h4>
    <hr>
    <?php foreach($sugestao as $usuario): ?>
        <td><a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $usuario['id']; ?>"><?php echo $usuario['nome']; ?></a></td>
        <tr>
            <?php if($usuario['seguido'] == 0): ?>
                <a href="home/seguir/<?php echo $usuario['id']; ?>  "> [Seguir] </a>
            <?php else: ?>
                <a href="home/unfollow/<?php echo $usuario['id']; ?>"> [Unfollow]</a>
            <?php endif; ?>
        </tr>
    <?php endforeach ?>
</div>

