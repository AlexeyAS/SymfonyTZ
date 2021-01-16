<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UsernameFormType;
use App\Form\Q1FormType;
use App\Form\Q2FormType;
use App\Form\Q3FormType;

class PageController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */
    public function index(): Response
    {

		$form = $this->createForm(UsernameFormType::class);
		/*
		if ($form->isSubmitted() && $form->isValid()) {
			$data->setSubject($req['username']);

			$data->setCreatedAt(new \DateTime());
		}
		*/
        return $this->render('page/index.html.twig', [
			'usernameForm' => $form->createView(),
			'errorsForm' => $form->getErrors()
        ]);
    }

	/**
	 * @Route("/1", name="question1")
	 */
	public function question1(): Response
	{

		$form = $this->createForm(Q1FormType::class);
		/*
		if ($form->isSubmitted() && $form->isValid()) {
			$data->setSubject($req['username']);

			$data->setCreatedAt(new \DateTime());
		}
		*/
		return $this->render('page/question1.html.twig', [
			'q1Form' => $form->createView(),
			'errorsForm' => $form->getErrors()
		]);
	}

	/**
	 * @Route("/2", name="question2")
	 */
	public function question2(): Response
	{

		$form = $this->createForm(Q2FormType::class);
		/*
		if ($form->isSubmitted() && $form->isValid()) {
			$data->setSubject($req['username']);

			$data->setCreatedAt(new \DateTime());
		}
		*/
		return $this->render('page/question2.html.twig', [
			'q2Form' => $form->createView(),
			'errorsForm' => $form->getErrors()
		]);
	}

	/**
	 * @Route("/3", name="question3")
	 */
	public function question3(): Response
	{

		$form = $this->createForm(Q3FormType::class);
		/*
		if ($form->isSubmitted() && $form->isValid()) {
			$data->setSubject($req['username']);

			$data->setCreatedAt(new \DateTime());
		}
		*/
		return $this->render('page/question3.html.twig', [
			'q3Form' => $form->createView(),
			'errorsForm' => $form->getErrors()
		]);
	}

	/**
	 * @Route("/result", name="result")
	 */
	public function result(): Response
	{

		$form = $this->createForm(UsernameFormType::class);
		/*
		if ($form->isSubmitted() && $form->isValid()) {
			$data->setSubject($req['username']);

			$data->setCreatedAt(new \DateTime());
		}
		*/
		return $this->render('page/question3.html.twig', [
			'q3Form' => $form->createView(),
			'errorsForm' => $form->getErrors()
		]);
	}

	/**
	 * @Route("/all", name="all")
	 */
	public function all(): Response
	{

		$data = $this->getDoctrine()->getRepository(Page::class)->findAll();

		return $this->render('page/all.html.twig', [
				'data' => $data
		]);
	}
}
