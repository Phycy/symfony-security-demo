<?php
/*
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}*/


// src/Controller/DashboardController.php
/*namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return new Response('<h1>Welcome to the Dashboard! (Protected Area)</h1>');
    }
}*/

/*namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        // Check if current user has ROLE_ADMIN
        $isAdmin = $this->isGranted('ROLE_ADMIN');

        $message = $isAdmin
            ? 'You are logged in as Admin. You have full access.'
            : 'You are logged in as Regular User. Limited access granted.';

        return new Response("<h1>Dashboard</h1><p>{$message}</p>");
    }
}*/

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/dashboard', name: 'app_dashboard')]
#[IsGranted('ROLE_USER')]
class DashboardController extends AbstractController
{
    public function __invoke(): Response
    {
        $user = $this->getUser();

        $message = '';
        if ($this->isGranted('ROLE_ADMIN')) {
            $message = '<h1>You are logged in as Admin. You have full access.</h1>';
        } else {
            $message = '<h1>You are logged in as Regular User. Limited access granted.</h1>';
        }

        return new Response($message);
    }
}


