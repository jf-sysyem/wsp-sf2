<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GestoreType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstname', null, array(
                    'label' => 'negozio.form.firstname',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'user',
                        'placeholder' => 'negozio.form.firstname',
                    ),
                ))
                ->add('lastname', null, array(
                    'label' => 'negozio.form.lastname',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'user',
                        'placeholder' => 'negozio.form.lastname',
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
                ->add('telefono', null, array(
                    'label' => 'negozio.form.recapitoTelefonico',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'phone',
                        'placeholder' => 'negozio.form.recapitoTelefonico',
                    ),
                ))
                ->add('birthday', null, array(
                    'label' => 'negozio.form.birthday',
                    'translation_domain' => 'WSPACL',
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix date-picker',
                        'icon' => 'calendar',
                        'placeholder' => 'negozio.form.birthday',
                    ),
                ))
                ->add('gender', 'choice', array(
                    'label' => 'negozio.form.gender',
                    'translation_domain' => 'WSPACL',
                    'choices' => array(
                        'm' => 'negozio.gender.m',
                        'f' => 'negozio.gender.f'
                    ),
                    'expanded' => true,
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'placeholder' => 'negozio.form.gender',
                    ),
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'JF\ACLBundle\Entity\Gestore'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'wsp_aclbundle_negozio';
    }

}
