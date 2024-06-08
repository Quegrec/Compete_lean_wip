<?php

namespace App\Controller;

use App\Entity\NewsletterSubscriber;
use App\Form\LoginFormType;
use App\Form\SubscriptionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request): Response
    {
        $form = $this->createForm(LoginFormType::class);
        $form->handleRequest($request);

        $newsletterSubscriber = new NewsletterSubscriber();
        $newsletterForm = $this->createForm(SubscriptionFormType::class, $newsletterSubscriber);

        return $this->render('security/login.html.twig', [
            'loginForm' => $form->createView(),
            'newsletterForm' => $newsletterForm->createView()
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}