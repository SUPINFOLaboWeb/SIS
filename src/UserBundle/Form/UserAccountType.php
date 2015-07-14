<?php

namespace UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class UserAccountType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder,$options);
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('campus',"entity", [
                    "property" => "name",
                    "class" => "SupinfoBundle\\Entity\\Campus"
                ]
            )
        ;
        // Override pour IDBooster
        $builder->add("username","integer");
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\UserAccount'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'userbundle_useraccount';
    }
}
