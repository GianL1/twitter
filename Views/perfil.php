<?php if(!empty($perfil[0]['id_usuario']) && $_SESSION['twlg'] == $perfil[0]['id_usuario']): ?>
    <a href="<?php echo BASE_URL; ?>perfil/editarFoto/<?php echo $_SESSION['twlg']; ?>">Editar Foto</a><br>
<?php endif; ?>

<?php foreach ($perfil as $item): ?>

    <strong>
        <a href="<?php echo BASE_URL; ?>perfil/mostrar/<?php echo $item['id_usuario'];?>    ">
            <?php echo $item['nome_perfil']; ?> 
        </a>
    </strong><br>
<?php echo $item['mensagem']; ?>
    <hr>
<?php endforeach; ?>
