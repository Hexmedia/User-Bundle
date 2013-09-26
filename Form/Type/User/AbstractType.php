<?php

namespace Hexmedia\UserBundle\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array(
				'label' => 'Email',
				'required' => false,
				'attr' => array(
					'disabled' => 'disabled'
				)
			))
            ->add('enabled', 'checkbox', array(
				'label' => 'Account enabled',
				'required' => false
			))
            ->add('locked', 'checkbox', array(
				'label' => 'Account locked',
				'required' => false
			))
            ->add('expired', 'checkbox', array(
				'label' => 'Expired',
				'required' => false
			))
			->add('save', 'submit', array(
				'label' => 'Save'
			))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hexmedia\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'hexmedia_userbundle_usertype';
    }
}