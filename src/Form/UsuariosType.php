<?php

namespace App\Form;

use App\Entity\Usuarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('nome')
            ->add('telefone')
            ->add('tipo', ChoiceType::class, [
                'choices' => [
                    'Admin' => 1,
                    'Nutricionista' => 2,
                    'User' => 3,
                ],
                'attr' => [
                    'class' => 'tipo-field', // Adicione uma classe aqui
                ],
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                    'Nutricionista' => 'ROLE_NUTRICIONISTA',
                ],
                'multiple' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'roles-field', // Adicione uma classe aqui
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuarios::class,
        ]);
    }
}
