<?php

namespace WSP\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PubblicazioneType extends AbstractType
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
                    'placeholder' => "Inserisci il nome del pacchetto di pubblicazione",
                    'icon' => 'font'
                    )
                ))
            ->add('giorni', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Inserisci il numero di giorni di pubblicazione",
                    'icon' => 'calendar'
                    )
                ))
            ->add('prezzo', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Inserisci il prezzo in crediti",
                    'icon' => 'money'
                    )
                ))
            ->add('sconto', null, array(
                'attr' => array(
                    'class' => 'form-control', 
                    'placeholder' => "Vuoi mettere il pacchetto in offerta? Inserisci il prezzo promozionale!",
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
            'data_class' => 'WSP\ShopBundle\Entity\Pubblicazione'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wsp_shopbundle_pubblicazione';
    }
}
