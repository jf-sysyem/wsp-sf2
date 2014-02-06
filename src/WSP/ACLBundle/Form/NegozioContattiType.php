<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegozioContattiType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
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
                        'icon' => 'phone-square',
                        'placeholder' => 'negozio.form.fax',
                    ),
                ))
                ->add('emailNegozio', 'email', array(
                    'label' => 'negozio.form.emailNegozio',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'email',
                        'placeholder' => 'negozio.form.emailNegozio',
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
            'data_class' => 'WSP\ACLBundle\Entity\Negozio'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'wsp_aclbundle_negozio';
    }

}
