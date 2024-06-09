<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Promotion;
use App\Entity\Session;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annee')
            ->add('dateDebut', null, [
                'widget' => 'single_text',
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text',
            ])
            ->add('formation', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => function (Formation $formation) {
                    return sprintf('%s - %s - %s', $formation->getCertification(), $formation->getSpecialite(),$formation ->getnomOption());
                },
            ])
            ->add('sessions',EntityType::class, [
                'class' => Session::class,
                'choice_label' => 'id',
                'multiple' => true,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}
