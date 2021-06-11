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
            ->add('id_customer')
            ->add('type')
            ->add('description')
            ->add('price_range')
            ->add('id_product')
            ->add('facebook')
            ->add('instagram')
            ->add('twitter')
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
