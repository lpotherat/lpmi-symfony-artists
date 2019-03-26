<?php
namespace App\POPO;

use Symfony\Component\Validator\Constraints as Assert;

class Artist
{
    /**
     * @var int
     */
    private $id;
    /**
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     * @var string
     */
    private $name;
    /**
     * @Assert\NotBlank
     * @var string
     */
    private $style;
    /**
     * @Assert\NotBlank
     * @var string
     */
    private $dates;
    /**
     * 
     * @var string[]
     */
    private $oeuvres;
    
    /**
     * 
     * @return int|NULL
     */
    public function getId():?int{
        return $this->id;
    }
    /**
     * @return string|NULL
     */
    public function getName():?string
    {
        return $this->name;
    }

    /**
     * @return string|NULL
     */
    public function getStyle():?string
    {
        return $this->style;
    }

    /**
     * @return string|NULL
     */
    public function getDates():?string
    {
        return $this->dates;
    }

    /**
     * @return string[]|NULL
     */
    public function getOeuvres():?array
    {
        return $this->oeuvres;
    }

    /**
     * 
     * @param int $id
     */
    public function setId(?int $id){
        $this->id = $id;
    }
    
    /**
     * @param string $name
     */
    public function setName(?string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $style
     */
    public function setStyle(?string $style)
    {
        $this->style = $style;
    }

    /**
     * @param string $dates
     */
    public function setDates(?string $dates)
    {
        $this->dates = $dates;
    }

    /**
     * @param string[]|NULL  $oeuvres
     */
    public function setOeuvres(?array $oeuvres)
    {
        $this->oeuvres = $oeuvres;
    }

    
    
}

