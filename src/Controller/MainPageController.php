<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainPageController extends AbstractController
{
    public function index()
    {
        return $this->render('index.twig', [
            'controller_name' => 'MainPageController',
        ]);
    }

    public function prices()
    {
        return $this->render('prices.twig', [
            'controller_name' => 'MainPageController',
        ]);
    }
    public function abouts()
    {
        return $this->render('abouts.twig');
    }
    public function contacts()
    {
        return $this->render('contacts.twig');
    }


}
