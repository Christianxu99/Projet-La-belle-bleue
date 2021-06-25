<?php

namespace App\Form;

use App\Entity\Establishment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstablishmentRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type')
            ->add('description')
            ->add('price_range')
            ->add('address')
            ->add('facebook')
            ->add('instagram')
            ->add('twitter')
            ->add('photo')
            ->add('zipcode')
            ->add('city')
            ->add('phone')
            ->add('email')
            ->add('website')
            ->add('longitude')
            ->add('latitude')
            ->add('has')
            ->add('belong')
            ->add('id_pro')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Establishment::class,
        ]);
    }
}
