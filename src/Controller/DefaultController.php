<?php
declare(strict_types=1);

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/", methods={"GET"})
     */
    public function indexAction()
    {
        return new Response("");
    }
}