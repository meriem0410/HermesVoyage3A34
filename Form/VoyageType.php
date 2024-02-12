<?php

namespace App\Form;

use App\Entity\Programme;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('destination')
            ->add('prix')
            ->add('date')
            ->add('type')
            ->add('relation', EntityType::class, [
                'class' => Programme::class,
'choice_label' => 'id',
            ])
            ->add('image', FileType::class, [
                'label' => 'Image (JPEG, PNG)',
                'mapped' => false, // Indique que ce champ n'est pas associé à une propriété de l'entité
                'required' => false, // Le champ n'est pas obligatoire
                // Ajoutez d'autres options selon vos besoins, par exemple :
                // 'attr' => ['accept' => 'image/jpeg, image/png'] // Limite les types de fichiers acceptés
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
