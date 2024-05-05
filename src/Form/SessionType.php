<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Promotion;
use App\Entity\SalleClasse;
use App\Entity\Session;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('intitule')
            ->add('dateSession', null, [
                'widget' => 'single_text',
            ])
            ->add('heureDebut', null, [
                'widget' => 'single_text',
            ])
            ->add('heureFin', null, [
                'widget' => 'single_text',
            ])
            ->add('commentaire')
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
            ])
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class,
                'choice_label' => 'id',
            ])
            ->add('salleClasse', EntityType::class, [
                'class' => SalleClasse::class,
                'choice_label' => 'id',
            ])
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
