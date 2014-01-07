<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegozioStep1Type extends AbstractType {

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
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'placeholder' => 'negozio.form.categoria',
                    ),
                    'query_builder' => function(\WSP\ACLBundle\Entity\CategoriaRepository $er) {
                        return $er->createQueryBuilder('u')
                                ->where('u.public = :true')
                                ->setParameter('true', true)
                                ->orderBy('u.categoria', 'ASC');
                    },
                ))
                ->add('categorie', null, array(
                    'label' => 'negozio.form.categorie',
                    'translation_domain' => 'WSPACL',
                    'expanded' => true,
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'placeholder' => 'negozio.form.categorie',
                    ),
                    'query_builder' => function(\WSP\ACLBundle\Entity\CategoriaRepository $er) {
                        return $er->createQueryBuilder('u')
                                ->where('u.public = :true')
                                ->setParameter('true', true)
                                ->orderBy('u.categoria', 'ASC');
                    },
                ))
                ->add('ambulante', null, array(
                    'label' => 'negozio.form.ambulante',
                    'translation_domain' => 'WSPACL',
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'placeholder' => 'negozio.form.ambulante',
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
