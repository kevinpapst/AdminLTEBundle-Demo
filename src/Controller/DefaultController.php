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
     * @Route("/forms2", defaults={}, name="forms2")
     */
    public function forms2()
    {
        $form = $this->createForm(FormDemoModelType::class);

        return $this->render('default/form2.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/forms3", defaults={}, name="forms3")
     */
    public function forms3()
    {
        $form = $this->createForm(FormDemoModelType::class);

        return $this->render('default/form3.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function userPreferences()
    {
        return $this->render('control-sidebar/settings.html.twig', []);
    }
}
