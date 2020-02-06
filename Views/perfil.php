

<div class="main">
    <?php if(!empty($perfil[0]['id']) && $_SESSION['twlg'] == $perfil[0]['id']): ?>
        <a href="<?php echo BASE_URL; ?>perfil/editarFoto/<?php echo $_SESSION['twlg']; ?>">Editar Foto</a><br>
    <?php endif; ?>

    <?php if($perfil[0]['id_usuario'] == $_SESSION['twlg']): ?>
        <div class = "tweet-content-box">
                <form method="post" enctype="multipart/form-data" id="form-tweet">
                    <textarea name="msg" rows="1" cols="60"></textarea><br>
                    <input type="file" name="imagem_post"><br>
                    <button>Enviar</button><br>
                </form>
        </div>
    <?php endif; ?>
    <div class="post">
        <?php foreach ($perfil as $item): ?>
            <?php $id_curtidores = array($item['id_curtidores']); ?>

            <?php if(!empty($item['mensagem'])):?>
                <?php if(!empty($item['url_perfil'])): ?>
                    <img src="<?php echo BASE_URL; ?>Images/thumb/<?php echo $item['url_perfil']; ?>" width=60 height=40>
                <?php else: ?>
                    <img src="<?php echo BASE_URL; ?>Images/thumb/default.jpg" width=60 height=40>
                <?php endif; ?>
                
                    <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $item['id_usuario'];?>    ">
                        <?php echo $item['nome']; ?> 
                    </a>
                    <br>
                    <?php echo $item['mensagem']; ?><br>
                    <?php if(!empty($item['url_post'])):?>
                        <img src="<?php echo BASE_URL; ?>Images/posts/<?php echo $item['url_post'];?>" width=500 height=300>
                    <?php endif; ?>

                    <?php if($item['id_usuario'] == $_SESSION['twlg']): ?>
                        <a href=" <?php echo BASE_URL; ?>post/delete/<?php echo $item['id'];?> " id="deletar_post">Deletar Post</a><br>
                    <?php endif; ?>

                    <?php if(!empty($item['id_curtidores']) && in_array($_SESSION['twlg'], $id_curtidores)): ?>
                        <a href="<?php echo BASE_URL?>post/descurtir/<?php echo $item['id_post']; ?>">Descurtir</a><br>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL?>post/curtir/<?php echo $item['id_post']; ?>">Curtir</a>
                    <?php endif; ?> <br>
                    Curtidas: <?php echo $item['curtidas']; ?>
            <?php endif; ?>
            <hr>
        <?php endforeach; ?>
    </div>
</div>
