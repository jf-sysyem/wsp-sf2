<?php

namespace WSP\PromoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessaggioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Inserisci l'oggetto dell'email",
                    'icon' => 'envelope'
                    )
                ))
            ->add('body', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'rows' => 10, 
                    'placeholder' => "Scrivi il testo dell'email"
                    )
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WSP\PromoBundle\Entity\Messaggio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'promo_messaggio';
    }
}
