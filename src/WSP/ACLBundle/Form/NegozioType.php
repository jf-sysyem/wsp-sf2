<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegozioType extends AbstractType {

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
                ->add('categoria', null, array(
                    'label' => 'negozio.form.categoria',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'road',
                        'placeholder' => 'negozio.form.categoria',
                    ),
                ))
                ->add('categorie', null, array(
                    'label' => 'negozio.form.categorie',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'road',
                        'placeholder' => 'negozio.form.categorie',
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
                ->add('logo', 'file', array(
                    'label' => 'negozio.form.logo',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'picture-o',
                        'placeholder' => 'negozio.form.logo',
                    ),
                ))
                ->add('descrizione', 'textarea', array(
                    'label' => 'negozio.form.descrizione',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'font',
                        'placeholder' => 'negozio.form.descrizione',
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
                        'icon' => 'phone-square',
                        'placeholder' => 'negozio.form.fax',
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
                ->add('ambulante', null, array(
                    'label' => 'negozio.form.ambulante',
                    'translation_domain' => 'WSPACL',
                    'label_attr' => array(
                        'class' => 'control-label visible-ie8 visible-ie9',
                    ),
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'truck',
                        'placeholder' => 'negozio.form.ambulante',
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
