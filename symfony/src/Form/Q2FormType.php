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
			->add('q2', ChoiceType::class, [
				'choices' => array('Красный' => 'красный', 'Жёлтый' => 'жёлтый', 'Зелёный' => 'зелёный', 'Синий' => 'синий'),
				'required' => true,
				'expanded' => true,
				'multiple' => true
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Page::class,
		]);
	}
}
