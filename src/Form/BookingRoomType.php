<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('checkinDate')
            ->add('checkoutDate')
            ->add('betaalMethode', ChoiceType::class, [
                'choices' => [
                    'ING' => true,
                    'ABN' => true,
                    'RABO' => true,
                    'KNAB' => true,
                    'PAYPAL' => true
                ]
            ])
//            ->add('room_id')
//            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
