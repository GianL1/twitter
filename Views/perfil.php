

<?php if(!empty($perfil[0]['id']) && $_SESSION['twlg'] == $perfil[0]['id']): ?>
    <a href="<?php echo BASE_URL; ?>perfil/editarFoto/<?php echo $_SESSION['twlg']; ?>">Editar Foto</a><br>
<?php endif; ?>

<?php foreach ($perfil as $item): ?>
    <?php $id_curtidores = array($item['id_curtidores']); ?>

    <?php if(!empty($item['mensagem'])):?>
            <img src="<?php echo BASE_URL; ?>Images/thumb/<?php echo $item['url_perfil']; ?>" width=60 height=40>
        <strong>
            <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $item['id'];?>    ">
                <?php echo $item['nome']; ?> 
            </a>
        </strong><br>
            <?php echo $item['mensagem']; ?>
            <?php if(!empty($item['url_post'])):?>
                <img src="<?php echo BASE_URL; ?>Images/posts/<?php echo $item['url_post'];?>">
            <?php endif; ?>

            <?php if(!empty($item['id_curtidores']) && in_array($_SESSION['twlg'], $id_curtidores)): ?>
                <a href="<?php echo BASE_URL?>post/descurtir/<?php echo $item[0]; ?>">Descurtir</a><br>
            <?php else: ?>
                <a href="<?php echo BASE_URL?>post/curtir/<?php echo $item[0]; ?>">Curtir</a>
            <?php endif; ?> <br>
            Curtidas: <?php echo $item['curtidas_post']; ?>
    <?php endif; ?>
    <hr>
<?php endforeach; ?>
