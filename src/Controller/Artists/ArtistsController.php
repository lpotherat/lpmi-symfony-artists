<?php
namespace App\Controller\Artists;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArtistRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArtistsController extends AbstractController
{
    
    /**
     * @Route("/artists",name="artist_list")
     * @return Response
     */
    public function artists():Response {
        
        $menu = [
            ["text"=>"Accueil","route"=>"home","args"=>[]],
            ["text"=>"Artistes","route"=>"artist_list","args"=>[]],
        ];
        
        $artistRepository = new ArtistRepository();
        $artists = $artistRepository->getArtists();
        
        return $this->render('artists/artists.html.twig',["menu"=>$menu,"artists"=>$artists]);
    }
    
    /**
     * @Route("/artist/{id<\d+>}",name="artist_detail")
     * @throws NotFoundHttpException
     */
    public function artist(int $id):Response {
        $artistRepository = new ArtistRepository();
        $artist = $artistRepository->getArtistById($id);
        
        if ($artist === null) {
            throw $this->createNotFoundException();
        }
        
        return $this->render('artists/artist.html.twig',['artist'=>$artist]);
    }
}

