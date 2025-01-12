<?php

// src/Controller/ToDoController.php
namespace App\Controller;

use App\Entity\ToDo;
use App\Form\ToDoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/', name: 'todo_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $todos = $em->getRepository(ToDo::class)->findAll();

        return $this->render('todo/index.html.twig', [
            'todos' => $todos,
        ]);
    }

    #[Route('/todo/new', name: 'todo_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $todo = new ToDo();
        $form = $this->createForm(ToDoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($todo);
            $em->flush();

            return $this->redirectToRoute('todo_index');
        }

        return $this->render('todo/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/todo/edit/{id}', name: 'todo_edit')]
    public function edit(Request $request, ToDo $todo, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ToDoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('todo_index');
        }

        return $this->render('todo/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/todo/delete/{id}', name: 'todo_delete')]
    public function delete(ToDo $todo, EntityManagerInterface $em): Response
    {
        $em->remove($todo);
        $em->flush();

        return $this->redirectToRoute('todo_index');
    }
}
