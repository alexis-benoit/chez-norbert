<?php

namespace App\Form;

use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, ['required' => true,])
            ->add('type', ChoiceType::class, [
                    'choices'  => [
                        'Gite' => 'Gite',
                        'Chambre d\'hote' => 'Chambre hote',
                    ],
                    'expanded' => true,
                    'multiple' => false,
                    'placeholder' => false,
                    'required' => true,
            ])
            ->add('peopleNumber', IntegerType::class, ['required' => true,])
            ->add('description', TextareaType::class, ['required' => true,])
            ->add('advantage',CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => TextType::class]
            )
            ->add('send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
            'translation_domain' => 'forms'
        ]);
    }
}
