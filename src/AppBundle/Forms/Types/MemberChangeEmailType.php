<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 2/1/18
 * Time: 6:07 PM
 */

namespace AppBundle\Forms\Types;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;

class MemberChangeEmailType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('new email', EmailType::class, [
                'constraints' => [new Email()]
            ])
            ->add('signup', SubmitType::class, ['label' => 'Sign up'])
        ;
    }

}