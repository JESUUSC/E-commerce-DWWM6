<?php

namespace App\Form;

use App\Entity\ContenuPanier;
use App\Entity\Produit;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du produit',
            ])
            ->add('description', TextType::class,[
                'label' => 'Description',
            ])
            ->add('prix', FloatType::class)
            ->add('stock')
            ->add('photo')
            ->add('contenuPaniers', ContenuPanierType::class, [
                'class' => ContenuPanier::class,
                'choice_label' => 'panier',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
