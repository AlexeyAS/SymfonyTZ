<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UsernameFormType;
use App\Form\Q1FormType;
use App\Form\Q2FormType;
use App\Form\Q3FormType;
use Doctrine\ORM\EntityRepository;


class PageController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */
	public function index(Request $request): Response
	{

		$form = $this->createForm(UsernameFormType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$username = $_POST['username_form']['username'];
			return $this->redirectToRoute('question1', ['username' => $username]);
		} else {
			return $this->render('page/index.html.twig', [
				'usernameForm' => $form->createView(),
			]);
		}
	}

	/**
	 * @Route("/1", name="question1")
	 */

	public function question1(Request $request): Response
	{
		$username = $_GET['username'];
		$form = $this->createForm(Q1FormType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted()) {
			$q1 = $_POST['q1_form']['question1'];
			return $this->redirectToRoute('question2', ['username' => $username, 'question1' => $q1]);
		} else {
			return $this->render('page/question1.html.twig', [
				'q1Form' => $form->createView(),
			]);
		}
	}

	/**
	 * @Route("/2", name="question2")
	 */
	public function question2(Request $request): Response
	{

		$username = $_GET['username'];
		$q1 = $_GET['question1'];
		$form = $this->createForm(Q2FormType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$q2 = implode('_',$_POST['q2_form']['question2']);
			return $this->redirectToRoute('question3', ['username' => $username, 'question1' => $q1, 'question2' => $q2]);
		} else {
			return $this->render('page/question2.html.twig', [
				'q2Form' => $form->createView(),
			]);
		}
	}

	/**
	 * @Route("/3", name="question3")
	 */
	public function question3(Request $request): Response
	{

		$username = $_GET['username'];
		$q1 = $_GET['question1'];
		$q2 = $_GET['question2'];

		$form = $this->createForm(Q3FormType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$q3 = $_POST['q3_form']['question3'];
			return $this->redirectToRoute('result',
				['username' => $username, 'question1' => $q1, 'question2' => $q2, 'question3' => $q3]);
		} else {
			return $this->render('page/question3.html.twig', [
				'q3Form' => $form->createView(),
			]);
		}
	}

	/**
	 * @Route("/result", name="result")
	 */
	public function result(): Response
	{

		$username = $_GET['username'];
		$q1 = $_GET['question1'];
		$q2 = $_GET['question2'];
		$q3 = $_GET['question3'];

		$c1 = 'красный';
		$c2 = 'зелёный_жёлтый';
		$c3 = 'синий';

		$data = new Page();
		$data->setUsername($username);
		$data->setQuestion1($q1);
		$data->setQuestion2($q2);
		$data->setQuestion3($q3);
		$data->setCreatedAt(new \DateTime());
		$em = $this->getDoctrine()->getManager();
		$em->persist($data);
		$em->flush();

		$result = ['name' => $username,'q1' => $q1,'q2' => $q2,'q3' => $q3];

		if ($q1 == $c1){
			$a1 = true;
		} else {
			$a1 = false;
		}
		if ($q2 == $c2){
			$a2 = true;
		} else {
			$a2 = false;
		}
		if (strtolower($q3) == $c3){
			$a3 = true;
		} else {
			$a3 = false;
		}

		return $this->render('page/result.html.twig', [
			'result' => $result,
			'answer1' => $a1,
			'answer2' => $a2,
			'answer3' => $a3,
			'correct1' => $c1,
			'correct2' => $c2,
			'correct3' => $c3
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
