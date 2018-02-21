<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Client;
use App\Entity\Disability;
use App\Entity\MaritalStatus;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname', TextType::class, array(
                'attr' => array('pattern' => '^[а-яА-Яa-zA-Z]+$')))
            ->add('name', TextType::class, array(
                'attr' => array('pattern' => '^[а-яА-Яa-zA-Z]+$')))
            ->add('patronymic', TextType::class, array(
                'attr' => array('pattern' => '^[а-яА-Яa-zA-Z]+$')))
            ->add('birthday', BirthdayType::class)
            ->add('passportSeries', TextType::class, array(
                'attr' => array('pattern' => '^[A-Z]{2}$')))
            ->add('passportNumber', TextType::class, array(
                'attr' => array('pattern' => '^\d{7}$')
            ))
            ->add('issuedBy', TextType::class)
            ->add('issuedDate', DateType::class)
            ->add('identityNumber', TextType::class, array(
                'attr' => array('pattern' => '^[0-9]{7}[A-Z]{1}[0-9]{3}[A-Z]{2}[0-9]{1}$')))
            ->add('birthPlace', TextType::class)
            ->add('residenceCityId',  EntityType::class, array(
                'class' => City::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
                'choice_label' => 'name',
            ))
            ->add('residenceAddress', TextType::class)
            ->add('homePhone', TextType::class, array(
                'required' => false,
                'attr' => array('pattern' => '\+375\((17|29|33|44)\)[0-9]{7}$')
            ))
            ->add('mobilePhone', TextType::class, array(
                'required' => false,
                'attr' => array('pattern' => '\+375\((17|29|33|44)\)[0-9]{7}$')
            ))
            ->add('email', EmailType::class, array(
                'required' => false))
            ->add('workingPlace', TextType::class, array(
                'required' => false))
            ->add('position', TextType::class, array(
                'required' => false))
            ->add('maritalStatusId', EntityType::class, array(
                'class' => MaritalStatus::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ms')
                        ->orderBy('ms.id', 'ASC');
                },
                'choice_label' => 'name',
            ))
            ->add('citizenshipId', EntityType::class, array(
                'class' => City::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
                'choice_label' => 'name',
            ))
            ->add('disabilityId', EntityType::class, array(
                'class' => Disability::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->orderBy('d.id', 'DESC');
                },
                'choice_label' => 'name',
            ))
            ->add('pensioner', CheckboxType::class , array(
                'required' => false))
            ->add('monthlyIncome', TextType::class, array(
                'required' => false,
                'attr' => array('pattern' => '^\d+$')
            ))
            ->add('reservist', CheckboxType::class, array(
                'required' => false))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}