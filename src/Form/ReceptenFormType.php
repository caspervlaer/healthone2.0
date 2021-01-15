<?php

namespace App\Form;

use App\Entity\Medicijnen;
use App\Entity\Recept;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceptenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum')
            ->add('dosis')
            ->add('duur')
            ->add('medicijn', EntityType::class, array(
                'class' => Medicijnen::class,
                'choice_label' => 'name',
                'placeholder' => 'kies een medicijn'
            ))
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recept::class,
        ]);
    }
}
