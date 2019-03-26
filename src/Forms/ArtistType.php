<?php
namespace App\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\POPO\Artist;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArtistType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name',TextType::class)
        ->add('style',TextType::class)
        ->add('dates',TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Create artist'])
        ->getForm()
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}

