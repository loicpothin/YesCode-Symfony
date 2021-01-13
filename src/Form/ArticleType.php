<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre de l\'article',
                'attr'  => ['placeholder' => 'Tapez votre titre ici !' ]
            ])
            ->add('intro', TextType::class,[
                'label' => 'Titre de l\'intro',
                'attr'  => ['placeholder' => 'Une phrase d\'accroche !']
            ])
            ->add('content',TextareaType::class,[
                'label' => 'Votre contenu',
                'attr'  => ['placeholder' => 'Dites-nous tout !']
            ])
            ->add('image',UrlType::class,[
                'label' => 'Adresse de l\'image',
                'attr'  => ['placeholder' => 'Coller un lien d\'image !']
            ])
            ->add('Envoyer', SubmitType::class)
        

             
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
