<?php

namespace App\Form;

use App\Entity\Establishment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstablishmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('phone')

            ->add('type')
            ->add('photo')
            ->add('description')

            ->add('specialty_photo')
            ->add('specialty_description')
            ->add('specialty_price')

            ->add('product_type')
            ->add('price_range')

            ->add('opening_hours')


            ->add('website')
            ->add('facebook')
            ->add('twitter')
            ->add('instagram')

            ->add('has')
            ->add('belong')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Establishment::class,
        ]);
    }
}
