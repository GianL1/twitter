

<?php if(!empty($perfil[0]['id']) && $_SESSION['twlg'] == $perfil[0]['id']): ?>
    <a href="<?php echo BASE_URL; ?>perfil/editarFoto/<?php echo $_SESSION['twlg']; ?>">Editar Foto</a><br>
<?php endif; ?>

<?php foreach ($perfil as $item): ?>
    <?php if(!empty($item['mensagem'])):?>
        <strong>
            <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $item['id'];?>    ">
                <?php echo $item['nome']; ?> 
            </a>
        </strong><br>
            <?php echo $item['mensagem']; ?>
    <?php endif; ?>
    <hr>
<?php endforeach; ?>
