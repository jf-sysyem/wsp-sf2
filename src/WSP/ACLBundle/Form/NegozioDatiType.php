<?php

namespace WSP\ACLBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NegozioDatiType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nome', null, array(
                    'label' => 'negozio.form.nome',
                    'translation_domain' => 'WSPACL',
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'icon' => 'building',
                        'placeholder' => 'negozio.form.nome',
                    ),
                ))
                ->add('descrizione', 'textarea', array(
                    'label' => 'negozio.form.descrizione',
                    'translation_domain' => 'WSPACL',
                    'attr' => array(
                        'class' => 'form-control placeholder-no-fix',
                        'placeholder' => 'negozio.form.descrizione',
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
