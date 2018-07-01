<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\FormDemoModelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", defaults={}, name="homepage")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/forms", defaults={}, name="forms")
     */
    public function forms()
    {
        $form = $this->createForm(FormDemoModelType::class);

        return $this->render('default/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/login", defaults={}, name="login")
     */
    public function login()
    {
        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/logout", defaults={}, name="logout")
     */
    public function logout()
    {
        return $this->render('default/index.html.twig');
    }

    public function userPreferences()
    {
        return $this->render('control-sidebar/settings.html.twig', []);
    }
}
