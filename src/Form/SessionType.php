<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Promotion;
use App\Entity\SalleClasse;
use App\Entity\Session;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
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
                'choice_label' => 'nom',
                'query_builder' => function (UtilisateurRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :role')
                        ->setParameter('role', '%"ROLE_PROFESSEUR"%');
                },
            ])
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class,
                'choice_label' => 'nomMatiere',
            ])
            ->add('salleClasse', EntityType::class, [
                'class' => SalleClasse::class,
                'choice_label' => 'nomSalle',
            ])
            ->add('promotion', EntityType::class, [
                'class' => Promotion::class,
                'choice_label' => function(Promotion $promotion) {
                    return $promotion->getFormation()->getSpecialite();  // Afficher le nom de la formation
                },
                'multiple' => true, 
                'expanded' => true,
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