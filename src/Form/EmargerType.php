<?php

namespace App\Form;

use App\Entity\Emarger;
use App\Entity\Session;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmargerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('presence')
            ->add('alternative')
            ->add('heureArrivee', null, [
                'widget' => 'single_text',
            ])
            ->add('heureDepart', null, [
                'widget' => 'single_text',
            ])
            ->add('session', EntityType::class, [
                'class' => Session::class,
                'choice_label' => 'id',
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emarger::class,
        ]);
    }
}
