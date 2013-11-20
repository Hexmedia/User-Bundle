<?php
namespace Hexmedia\UserBundle\Form\Type\User;

use Symfony\Component\Form\FormBuilderInterface;

class EditType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "content_page_type_edit";
    }

    protected function doBuildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'delete',
            'submit',
            [
                'label' => 'Delete',
                'attr' => [
                    'class' => "btn-danger"
                ]
            ]
        );
    }
}