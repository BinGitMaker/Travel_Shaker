<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Hotel;
use App\Entity\Resto;
use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
            TextType::class,
            [
                'label' => 'Nom de la ville',
            ],
            )
            ->add('date',
            DateType::class,
            [
                'label' => 'Date de la dernière visite',
            ],
            )
            ->add('picture',
            TextType::class,
            [
                'label' => 'Photo de la ville (clic-droit: copier l\'adresse de l\'image)',
            ],
            )
            ->add('duration',
            NumberType::class,
            [
                'label' => 'Temps passé sur place (en jour, ex: 1 pour 1 jour)',
            ],
            )
            ->add('content',
            CKEditorType::class,
            [
                'label' => 'Contenu de la page',
                'config_name' => 'full',
                'attr' => ['rows' => '10'],
            ],
            )
            ->add('slug')
            ->add('activity',
            EntityType::class,
            [
                'label' => 'Activité',
                'class' => Activity::class,
            ],
            )
            ->add('hotel',
            EntityType::class,
            [
                'label' => 'Hotel',
                'class' => Hotel::class,
            ],
        )
            ->add('resto',
            EntityType::class,
            [
                'label' => 'Restaurant',
                'class' => Resto::class,
            ],
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => City::class,
        ]);
    }
}
