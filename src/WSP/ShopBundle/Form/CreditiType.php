<?php

namespace WSP\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreditiType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Inserisci il nome del pacchetto",
                    'icon' => 'font'
                    )
                ))
            ->add('crediti', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Inserisci il numero di crediti",
                    'icon' => 'money'
                    )
                ))
            ->add('prezzo', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Inserisci ilprezzo del pacchetto",
                    'icon' => 'eur'
                    )
                ))
            ->add('sconto', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Vuoi mettere il pacchetto in offerta? ",
                    'icon' => 'eur'
                    )
                ))
            ->add('descrizione', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Promuovi il pacchetto",
                    )
                ))
            ->add('visibile')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WSP\ShopBundle\Entity\Crediti'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wsp_shopbundle_crediti';
    }
}
