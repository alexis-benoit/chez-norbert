<?php

namespace App\Form;

use App\Entity\House;
use App\Entity\Media;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class HouseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, [
                    'choices'  => $this->getChoices(),
                    'expanded' => true,
                    'multiple' => false,
                    'placeholder' => false,
            ])
            ->add('peopleNumber', IntegerType::class)
            ->add('description', TextareaType::class)
            ->add('advantage',CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => TextType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,]
            )
        ;

        $builder->add("medias", CollectionType::class, [
            "entry_type" => MediaType::class,
            "entry_options" => [ "label" => false ],
            "allow_add" => true,
            "allow_delete" => true,
            "by_reference" => false,
            "prototype" => true
        ]);


        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();

                if (isset($data['medias'])) {
                    foreach ($data['medias'] as $key => $image) {
                        $form->get('medias')->add('mediaFile', FileType::class, [
                            'required' => false,
                        ]);
                    }
                }
            }
        );
        if (!$options['edit']) {
            // $builder->add('imageFiles', VichFileType::class, [
            //     // 'multiple' => true,
            //     // "allow_extra_fields" => true
            // ]);

            // $builder->add("imageFiles", CollectionType::class, [
            //     "entry_type" => VichFileType::class,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            // ]);

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => House::class,
            'translation_domain' => 'forms',
            'edit' => false,
        ]);
    }

    private function getChoices () {
        $choices = House::$houseTypes;
        $output = [];

        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }

        return $output;
    }
}
