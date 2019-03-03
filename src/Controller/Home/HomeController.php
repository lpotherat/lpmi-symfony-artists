<?php
namespace App\Controller\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    
    /**
     * @Route("/",name="home")
     */
    public function home():Response{
        $menu = [
            ["text"=>"Accueil","route"=>"home","args"=>[]],
            ["text"=>"Artistes","route"=>"artist_list","args"=>[]],
        ];
        
        return $this->render('home/home.html.twig',["menu"=>$menu]);
    }
    
}

