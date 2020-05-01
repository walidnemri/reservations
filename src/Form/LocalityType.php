<?php

namespace App\Form;

use App\Entity\Locality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slug')
            ->add('designation')
            ->add('address')
            ->add('location_id')
            ->add('website')
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Locality::class,
        ]);
    }
}
