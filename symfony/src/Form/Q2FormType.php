<?php

namespace App\Form;

use App\Entity\Page;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Q2FormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('question2', ChoiceType::class, [
				'choices' => array('Красный' => 'красный', 'Зелёный' => 'зелёный', 'Жёлтый' => 'жёлтый', 'Синий' => 'синий'),
				'expanded' => true,
				'multiple' => true,
				'mapped' => false,
				/*
				'empty_data' => 'Choose an option',
				'error_bubbling' => false
				*/
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Page::class,
		]);
	}
}
