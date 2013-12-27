<?php

namespace WSP\ACLBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseForm;

class RegistrationFormType extends BaseForm {

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('email', 'email', array(
                    'label' => 'register.form.email',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'envelope',
                        'placeholder' => 'register.form.email',
                    ),
                ))
                ->add('username', null, array(
                    'label' => 'register.form.username',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'user',
                        'placeholder' => 'register.form.username',
                    ),
                ))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'WSPACL'),
                    'first_options' => array(
                        'label' => 'register.form.password',
                        'label_attr' => array(
                            'class' => 'control-label visible-ie8 visible-ie9',
                        ),
                        'attr' => array(
                            'class' => 'form-control placeholder-no-fix',
                            'icon' => 'lock',
                            'placeholder' => 'register.form.password',
                        ),
                    ),
                    'second_options' => array(
                        'label' => 'register.form.password_confirmation',
                        'label_attr' => array(
                            'class' => 'control-label visible-ie8 visible-ie9',
                        ),
                        'attr' => array(
                            'class' => 'form-control placeholder-no-fix',
                            'icon' => 'check',
                            'placeholder' => 'register.form.password_confirmation',
                        ),
                    ),
                    'invalid_message' => 'register.form.error.password.mismatch',
                ))
                ->add('codiceInvito', null, array(
                    'label' => 'register.form.codice_invito',
                    'translation_domain' => 'WSPACL',
//                    'label_attr' => array(
//                        'class' => 'control-label visible-ie8 visible-ie9',
//                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'font',
                    ),
                ))
                ->add('agree', 'checkbox', array(
                    'mapped' => false,
                    'label' => 'register.form.agree',
                    'translation_domain' => 'WSPACL',
                    'required' => true,
//                    'label_attr' => array(
//                        'class' => 'control-label visible-ie8 visible-ie9',
//                    ),
//                    'attr' => array(
//                        'class' => 'form-control placeholder-no-fix',
//                        'icon' => 'font',
//                    ),
                ))
        ;
    }

}
