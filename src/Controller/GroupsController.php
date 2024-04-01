<?php

namespace App\Controller;

use App\Entity\Groups;
use App\Repository\GroupsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GroupsController extends AbstractController
{
    #[Route('/groups', name: 'app_groups')]
    public function allGroups(GroupsRepository $repository): Response
    {
        $groups = $repository->findAll();
        
        return $this->render(
            'groups/groupes.html.twig',
            [
                'groups' => $groups
            ]
        );
    }

    #[Route('/group/{id}', name: 'id_group')]
    public function groupById(Groups $group): Response
    {
        
        return $this->render(
            'groups/groupe.html.twig',
            [
                'group' => $group
            ]
        );
    }
}
