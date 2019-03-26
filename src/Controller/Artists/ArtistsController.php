<?php
namespace App\Controller\Artists;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArtistRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\POPO\Artist;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Forms\ArtistType;

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
    
    /**
     * @Route("/artist/create",name="artist_create")
     * @return Response
     */
    public function create(Request $request):Response {
        $artist = new Artist();
        
        /**
         * Les formulaires peuvent être créés directement dans les contrôleurs
         * 
         *
        $form = $this->createFormBuilder($artist)
        ->setAction($this->generateUrl($route))
        ->add('name',TextType::class)
        ->add('style',TextType::class)
        ->add('dates',TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Create artist'])
        ->getForm()
        ;*/
        
        $form = $this->createForm(ArtistType::class,$artist);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $artist = $form->getData();  
            
            //TODO sauvegarder l'artiste dans la base de données par exemple
            
          return $this->redirectToRoute('artist_list');
        }
        
        return $this->render('artists/create.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    
    
    
}

