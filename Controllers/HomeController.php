<?php

namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use \Models\Relacionamentos;
use \Models\Posts;

class HomeController extends Controller {

    public function __construct(){
        $u = new Usuarios();

        if(!$u->isLogged())
        {
            header('Location:'.BASE_URL.'login');
        }
    }

    public function index(){
        $dados = array(
            'nome' => ''
        );
        
        $p = new Posts();
        
        if(isset($_POST["msg"]) && !empty($_POST["msg"])) {
            $msg = $_POST['msg'];
            
            
            $id_post = $p->inserirPost($msg);
            
            
            if(isset($_FILES['imagem_post']) && !empty($_FILES['imagem_post'])){
                
                $img = $_FILES['imagem_post'];
                $nome_do_arquivo = md5(time().rand(0,99)).'.png';
                
                move_uploaded_file($img['tmp_name'], "Images/posts/".$nome_do_arquivo);
                
                $p->inserirImagemPost($nome_do_arquivo, $id_post);
            }
            header('Location:'.BASE_URL);
        }

        $u = new Usuarios($_SESSION['twlg']);
        
        $dados['nome'] = $u->getNome();
        $dados['qt_seguindo'] = $u->getCountSeguidos();
        $dados['qt_seguidores'] = $u->getCountSeguidores();
        $dados['sugestao'] = $u->getUsuarios(5);
        $dados['thumb'] = $u->getThumb();
        
        
        $lista = $u->getSeguidos();
        $lista[] = $_SESSION['twlg'];
        
        
        $dados['feed'] = $p->getFeed($lista, 10);
        $this->loadTemplate('home', $dados);
    }
    
    public function seguir($id) {
        if(!empty($id)){
            
            $u = new Usuarios();
            $id = addslashes($id);
            
            
            if($u->checkId($id)) {
                
                $r = new Relacionamentos();
                $r->seguir($_SESSION['twlg'], $id);
                header('Location:'.BASE_URL);
            }
        }
        
        header('Location:'.BASE_URL);
    }
    
    public function unfollow($id) {
        if(isset($id) && !empty($id))
        {
            $id = addslashes($id);
            
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            if($sql->rowCount() === 1 ) {
                $r = new Relacionamentos();
                $r->unfollow($_SESSION['twlg'], $id);
            }
        }
        
        header('Location:'.BASE_URL);
    }
}