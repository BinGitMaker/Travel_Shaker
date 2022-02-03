<?php

namespace App\Form;

use App\Entity\Hotel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
            TextType::class,
            [
                'label' => 'Nom de l\'hotel',
            ],
            )
            ->add('picture',
            TextType::class,
            [
                'label' => 'Photo de l\'hotel (clic-droit: copier l\'adresse de l\'image)',
            ],
            )
            ->add('url',
            TextType::class,
            [
                'label' => 'lien vers l\'hotel (clic-droit: copier l\'adresse de l\'image)',
            ],
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hotel::class,
        ]);
    }
}
