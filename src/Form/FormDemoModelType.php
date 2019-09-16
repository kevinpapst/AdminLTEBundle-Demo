<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

class FormDemoModelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $radios = [
            'This is option 1' => 'opt1',
            'This is option 2' => 'opt2',
            'This is option 3' => 'opt3',
        ];

        $choices = [
            'This is choice 1' => 'choice1',
            'This is choice 2' => 'choice2',
            'This is choice 3' => 'choice3',
        ];

        $options = [
            'This is the first option' => 'choice1',
            'This is choice 2' => 'choice2',
            'This is choice 3' => 'choice3',
            'Honey' => 'choice4',
            'Banana' => 'choice5',
            'Apples' => 'choice6',
            'Oranges' => 'choice7',
            'Mustard' => 'choice8',
            'Hot dog with mustard' => 'choice9',
        ];

        $builder
            ->add('name', TextType::class, [
                'help' => 'This needs to be at least 3 character',
                'constraints' => new Length(['min' => 3]),
            ])
            ->add('job', ChoiceType::class, [
                'choices' => ['Pilot' => 'p', 'Doctor' => 'doc', 'Manager' => 'm', 'Developer' => 'd', 'Other' => 'o'],
                'constraints' => new EqualTo(['value' => 'd', 'message' => 'Nope! The best job in the world is Developer ... at least for me ;-)']),
                'help' => 'Choose the best job in the world',
            ])
            ->add('bootstrapSelect', ChoiceType::class, [
                'choices' => $options,
                'multiple' => true,
                'help' => 'Choose whatever you like',
                'attr' => ['class' => 'selectpicker', 'data-size' => 5, 'data-live-search' => true],
            ])
            ->add('someRadio', ChoiceType::class, [
                'constraints' => [
                    new NotNull(['message' => 'None is not allowed']),
                    new EqualTo(['value' => 'opt1', 'message' => 'Only option 1 is valid']),
                ],
                'choices' => $radios,
                'expanded' => true,
                'required' => false,
                'help' => 'Choose whatever you like',
            ])
            ->add('someChoices', ChoiceType::class, [
                'choices' => $choices,
                'expanded' => true,
                'multiple' => true,
                'required' => true,
                'help' => 'Choose whatever you like',
            ])
            ->add('username', TextType::class, [
                'required' => false,
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
            ])
            ->add('termsAccepted', CheckboxType::class, [
                'required' => false,
                'label' => false,
            ])
            ->add('termsAccepted', CheckboxType::class, [
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'constraints' => new Email(),
            ])
            ->add('phone', TelType::class, [
                'required' => false,
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
            ])
            ->add('date2', DateType::class, [
                'label' => 'Date (HTML 5)',
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ])
            ->add('time', TimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
            ])
            ->add('time2', TimeType::class, [
                'label' => 'Time (HTML 5)',
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ])
            ->add('datetime', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
            ])
            ->add('datetime2', DateTimeType::class, [
                'label' => 'Datetime (HTML 5)',
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ])
            ->add('price', MoneyType::class, [
                'label' => false,
                'required' => false,
            ])
            ->add('password', PasswordType::class, [
                'required' => false,
            ])
            ->add('Homepage', UrlType::class, [
                'required' => false,
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormDemoModelType::class,
        ]);
    }
}
