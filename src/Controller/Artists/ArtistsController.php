<?php
namespace App\Controller\Artists;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistsController extends AbstractController
{
    /**
     * @Route("/artists",name="artist_list")
     * @return Response
     */
    public function artists():Response{
        
        $menu = [
            ["text"=>"Accueil","route"=>"home","args"=>[]],
            ["text"=>"Artistes","route"=>"artist_list","args"=>[]],
        ];
        
        $artists = [
            ["name"=>"Dali"],
            ["name"=>"Picasso"],
        ];
        
        return $this->render('artists/artists.html.twig',["menu"=>$menu,"artists"=>$artists]);
    }
}

