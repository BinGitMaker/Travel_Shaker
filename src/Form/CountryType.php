<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Country;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',
            TextType::class,
            [
                'label' => 'Nom du pays',
            ],
            )
            ->add('date',
            DateType::class,
            [
                'label' => 'Date de la dernière visite',
            ],
            )
            ->add('duration',
            NumberType::class,
            [
                'label' => 'Temps passé sur place (en jour, ex: 1 pour 1 jour)',
            ],
            )
            ->add('hello',
            TextType::class,
            [
                'label' => 'Bonjour en local',
            ],
            )
            ->add('thanku',
            TextType::class,
            [
                'label' => 'Merci en local',
            ],
            )
            ->add('bye',
            TextType::class,
            [
                'label' => 'Au revoir en local',
            ],
            )
            ->add('picture',
            TextType::class,
            [
                'label' => 'Photo du pays (clic-droit: copier l\'adresse de l\'image)',
            ],
            )
            ->add(
                'alt',
                TextType::class,
            [
                'label' => 'Texte alternatif à l\'image',
            ],
            )
            ->add('diving',
            TextType::class,
            [
                'label' => 'Nom du centre de plongée',
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
            ->add('links',
            CKEditorType::class,
            [
                'label' => 'lien amis',
                'config_name' => 'light',
                'attr' => ['rows' => '3'],
            ],
            )
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Country::class,
        ]);
    }
}
