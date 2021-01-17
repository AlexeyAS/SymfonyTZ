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

class UsernameFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('username', TextType::class, [
				//'mapped' => true,
				'constraints' => [
					new NotBlank([
						'message' => 'Введите имя',
					]),
					new Length([
						'min' => 3,
						'minMessage' => 'Имя должно содержать не менее {{ limit }} символов',
						// max length allowed by Symfony for security reasons
						'max' => 20,
						'maxMessage' => 'Имя должно содержать не более {{ limit }} символов',
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
