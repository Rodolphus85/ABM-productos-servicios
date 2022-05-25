<?php

namespace App\Form;

use App\Entity\CondicionIva;
use App\Entity\ProductoServicio;
use App\Entity\Rubro;
use App\Entity\UnidadMedida;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductoServicioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipo', ChoiceType::class, [
                'choices'  => [
                    'Producto' => 'P',
                    'Servicio' => 'S'
                ],
            ])
            ->add('rubro', EntityType::class, [
                'class' => Rubro::class,
                'choice_label' => 'rubro'
            ])
            ->add('codigo', TextType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('productoServicio',TextType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('unidadMedida', EntityType::class, [
                'class' => UnidadMedida::class,
                'choice_label' => 'unidadMedida',
            ])
            ->add('condicionIva', EntityType::class, [
                'class' => CondicionIva::class,
                'choice_label' => 'condicionIva',
            ])                
            ->add('precioBrutoUnitario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductoServicio::class,
        ]);
    }
}
