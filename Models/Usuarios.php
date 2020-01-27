<?php
namespace Models;

use \Core\Model;

class Usuarios extends Model {
    
    private $uid;

    public function __construct($id = ''){

        parent::__construct();
        
        if(!empty($id)) {
            $this->uid = $id;
        }
    }

    public function isLogged(){

        if (isset($_SESSION['twlg']) && !empty($_SESSION['twlg'])) {
            return true;
        }else {
            return false;
        }
    }

    public function usuarioExiste($email){

        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
        
    }

    public function inserirUsuario($nome, $email, $senha){

        
        $sql = $this->pdo->prepare("INSERT INTO usuarios SET nome =:nome, email = :email, senha = :senha");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        
        $sql->execute();

        $id = $this->pdo->lastInsertId();

        return $id;
    }

    public function fazerLogin($email, $senha){
        
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);

        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            
            $_SESSION['twlg']=$sql['id'];

            return true;
        }else {
            return false;
        }
    }
    
    public function getNome(){
        if(!empty($this->uid)) {
            $sql = $this->pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $this->uid);
            $sql->execute();
            
            if($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                
                return $sql['nome'];

            }
        }
    }
    
    public function getCountSeguidos() {
        $sql = $this->pdo->prepare("SELECT * FROM relacionamentos WHERE id_seguidor = :id_seguidor");
        $sql->bindValue(":id_seguidor", $this->uid);
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function getCountSeguidores(){
        $sql = $this->pdo->prepare("SELECT * FROM relacionamentos WHERE id_seguido = :id_seguido");
        $sql->bindValue(":id_seguido", $this->uid);
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function getThumb() {
        $array = array();
        
        $sql = $this->pdo->prepare("SELECT url FROM imagem_perfil WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $this->uid);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }else {
            $array['url'] = 'default.jpg';
        }
        
        return $array['url'];
    }
    
    public function getUsuarios($l){
        
        $array = array();
        
        $sql = $this->pdo->prepare("SELECT 
        *,
        (SELECT COUNT(*) FROM relacionamentos WHERE relacionamentos.id_seguidor = :id_seguidor AND relacionamentos.id_seguido = usuarios.id) as seguido  
        FROM usuarios WHERE id != :id LIMIT ".$l);
        
        $sql->bindValue(":id_seguidor", $this->uid);
        $sql->bindValue(":id", $this->uid);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        } 
        
        return $array;
    }
    
    public function getSeguidos(){
        $array = array();
        $sql = $this->pdo->prepare("SELECT id_seguido FROM relacionamentos WHERE id_seguidor = :id_seguidor");
        $sql->bindValue(":id_seguidor", $this->uid);
        $sql->execute();
    
        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $id_seguido) {
                $array = $id_seguido;
            }
        }
    
        return $array;
    }


    public function checkId($id){

        $sql = $this->pdo->prepare("SELECT id FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
        
    }
}
