<?php

namespace App\Form;

use App\Entity\Alimento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class AlimentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('categoria', ChoiceType::class, [
                'choices' => [
                    'HORTIFRUTIGRANJEIROS' => 'HORTIFRUTIGRANJEIROS',
                    'CARNES' => 'CARNES',
                    'ESTOCÁVEIS' => 'ESTOCÁVEIS',
                    'MATERIAL DE LIMPEZA' => 'MATERIAL DE LIMPEZA',
                    'DESCARTÁVEIS' => 'DESCARTÁVEIS',
                ],
                'placeholder' => 'Selecione a categoria', // Opcional, para exibir um espaço reservado
                'required' => true, // Opcional, define se a seleção é obrigatória
            ])
            ->add('descricao', TextareaType::class, [
                'attr' => ['rows' => 10], // Defina o número de linhas que você achar adequado
            ])
            ->add('criterios', TextareaType::class, [
                'attr' => ['rows' => 10],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alimento::class,
        ]);
    }
}
