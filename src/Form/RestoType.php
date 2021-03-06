<?php

namespace App\Form;

use App\Entity\Resto;
use App\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RestoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name',
        TextType::class,
        [
            'label' => 'Nom du Restaurant',
        ],
        )
        ->add('picture',
        TextType::class,
        [
            'label' => 'Photo du resto (clic-droit: copier l\'adresse de l\'image)',
        ],
        )
        ->add('alt',
        TextType::class,
        [
            'label' => 'Texte alternatif à l\'image',
        ],
        )
        ->add('url',
        TextType::class,
        [
            'label' => 'lien vers le resto (clic-droit: copier l\'adresse de l\'image)',
        ],
        )
        ->add(
            'city',
            EntityType::class,
            [
                'label' => 'Ville associée',
                'class' => City::class,
            ],
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resto::class,
        ]);
    }
}
