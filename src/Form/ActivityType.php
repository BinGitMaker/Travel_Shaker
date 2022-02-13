<?php

namespace App\Form;

use App\Entity\Activity;
use App\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
            TextType::class,
            [
                'label' => 'Titre',
            ],
            )
            ->add('duration',
            NumberType::class,
            [
                'label' => 'Temps de l\'activité (en heure, ex: 1 pour 1 heure)',
            ],
            )
            ->add('picture',
            TextType::class,
            [
                'label' => 'Photo de l\'activité (clic-droit: copier l\'adresse de l\'image)',
            ],
            )
            ->add('alt',
            TextType::class,
            [
                'label' => 'Texte alternatif à l\'image',
            ],
            )
            ->add('city',
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
            'data_class' => Activity::class,
        ]);
    }
}
