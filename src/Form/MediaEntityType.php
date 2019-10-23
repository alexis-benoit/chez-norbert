<?php


namespace App\Form;


use App\Entity\Media;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaEntityType extends EntityType
{
    public function getParent()
    {
        return EntityType::class;
    }

    public function getBlockPrefix()
    {
        return 'media_entity';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'mapped' => true,
        ]);
    }


}