<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegozioGeoType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
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
                ->add('localita', null, array(
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
                ->add('latitudine', 'hidden')
                ->add('longitudine', 'hidden')
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
