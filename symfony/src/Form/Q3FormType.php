<?php

namespace App\Form;

use App\Entity\Page;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class Q3FormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('question3', TextType::class, [
				'constraints' => [
					new NotBlank([
						'message' => 'Введите цвет',
					]),
					new Length([
						'min' => 3,
						'minMessage' => 'Цвет должен содержать не менее {{ limit }} символов',
						// max length allowed by Symfony for security reasons
						'max' => 25,
						'maxMessage' => 'Цвет должен содержать не более {{ limit }} символов',
					]),
				],
				'required' => false,
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Page::class,
		]);
	}
}
