<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_users')]
    public function allGroups(UsersRepository $repository): Response
    {
        $users = $repository->findAll();
        
        return $this->render(
            'users/users.html.twig',
            [
                'users' => $users
            ]
        );
    }

    #[Route('/user/{id}', name: 'id_user')]
    public function groupById(Users $user): Response
    {
        
        return $this->render(
            'users/user.html.twig',
            [
                'user' => $user
            ]
        );
    }
}
