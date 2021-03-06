<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nome', null, array(
                    'label' => 'negozio.form.nome',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'building',
                        'placeholder' => 'negozio.form.nome',
                    ),
                ))
                ->add('indirizzo', null, array(
                    'label' => 'negozio.form.indirizzo',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'road',
                        'placeholder' => 'negozio.form.indirizzo',
                    ),
                ))
                ->add('citta', null, array(
                    'label' => 'negozio.form.localita',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'road',
                        'placeholder' => 'negozio.form.localita',
                    ),
                ))
                ->add('cap', null, array(
                    'label' => 'negozio.form.cap',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'road',
                        'placeholder' => 'negozio.form.cap',
                    ),
                ))
                ->add('partitaIva', null, array(
                    'label' => 'negozio.form.partitaIva',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'phone',
                        'placeholder' => 'negozio.form.partitaIva',
                    ),
                ))
                ->add('telefono', null, array(
                    'label' => 'negozio.form.telefono',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'phone',
                        'placeholder' => 'negozio.form.telefono',
                    ),
                ))
                ->add('cellulare', null, array(
                    'label' => 'negozio.form.cellulare',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'mobile',
                        'placeholder' => 'negozio.form.cellulare',
                    ),
                ))
                ->add('fax', null, array(
                    'label' => 'negozio.form.fax',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'print',
                        'placeholder' => 'negozio.form.fax',
                    ),
                ))
                ->add('email', null, array(
                    'label' => 'negozio.form.email',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'envelope',
                        'placeholder' => 'negozio.form.email',
                        'readonly' => 'readonly',
                    ),
                ))
                ->add('sito', null, array(
                    'label' => 'negozio.form.sito',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'link',
                        'placeholder' => 'negozio.form.sito',
                    ),
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'JF\ACLBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'wsp_aclbundle_negozio';
    }

}
