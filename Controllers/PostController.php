<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Posts;

class PostController extends Controller {
    
    public function curtir($id_post) {
        $p = new Posts();
        $p->curtirPost($id_post);
        
        header("Location: ". BASE_URL);
    }
    
    public function descurtir($id_post) {
        $p = new Posts();
        $p->descurtirPost($id_post);
        header("Location: ". BASE_URL);
    }
    
    public function delete($id_post) {
        $p = new Posts();
        $p->deletarPost($id_post);
        header("Location: ". BASE_URL);
    }
    
    public function getCountCurtidas() {
        $p = new Posts();
        $curtidas = $p->getCountCurtidas($_SESSION['twlg']);
        return $curtidas;
    }
}