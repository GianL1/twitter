

<?php if(!empty($perfil[0]['id']) && $_SESSION['twlg'] == $perfil[0]['id']): ?>
    <a href="<?php echo BASE_URL; ?>perfil/editarFoto/<?php echo $_SESSION['twlg']; ?>">Editar Foto</a><br>
<?php endif; ?>

<?php foreach ($perfil as $item): ?>
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
    <?php endif; ?>
    <hr>
<?php endforeach; ?>
