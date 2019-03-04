<?php
namespace App\Repository;

use App\POPO\Artist;

class ArtistRepository
{
    private static $artists = null;
    
    /**
     *
     * @return Artist[]
     */
    public function getArtists(){
        if (static::$artists === null) {
            $artist1 = new Artist();
            $artist1->setId(1);
            $artist1->setDates("1881 - 1973");
            $artist1->setName("Picasso");
            $artist1->setOeuvres(["Les demoiselles","La femme qui pleure"]);
            $artist1->setStyle("Cubisme");
            
            $artist2 = new Artist();
            $artist2->setId(2);
            $artist2->setDates("1904 - 1989");
            $artist2->setName("Dali");
            $artist2->setOeuvres(["La persistence de la mémoire","Montre molle au moment de la première explosion"]);
            $artist2->setStyle("Surréalisme");
            
            $artist3 = new Artist();
            $artist3->setId(3);
            $artist3->setDates("1819 - 1877");
            $artist3->setName("Courbet");
            $artist3->setOeuvres(["L'origine du monde","Le désespéré"]);
            $artist3->setStyle("Réalisme");
            
            static::$artists = [$artist1,$artist2,$artist3];
        }
        return static::$artists;
    }
    
    /**
     * 
     * @param int $id
     */
    public function getArtistById(int $id):?Artist{
        $artists = ArtistRepository::getArtists();
        foreach ($artists as $artist){
            if ($artist->getId() === $id) {
                return $artist;
            }
        }
        return null;
    }
}

