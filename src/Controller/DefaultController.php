<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\FormDemoModelType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default controller
 */
class DefaultController extends AbstractController
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
    public function forms(Request $request)
    {
        $form = $this->createForm(FormDemoModelType::class);
        $form = $this->handleForm($request, $form);

        return $this->render('default/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/forms2", defaults={}, name="forms2")
     */
    public function forms2(Request $request)
    {
        $form = $this->createForm(FormDemoModelType::class);
        $form = $this->handleForm($request, $form);

        return $this->render('default/form-horizontal.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/forms3", defaults={}, name="forms3")
     */
    public function forms3(Request $request)
    {
        $form = $this->createForm(FormDemoModelType::class);
        $form = $this->handleForm($request, $form);

        return $this->render('default/form-sidebar.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    protected function handleForm(Request $request, FormInterface $form)
    {
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->addFlash('success', "Fantastic work! You nailed it, form has no errors :-)");
            } else {
                $this->addFlash('error', "Form has errors ... please fix them!");
            }
        }

        return $form;
    }

    /**
     * @Route("/context", defaults={}, name="context")
     */
    public function context()
    {
        return $this->render('default/context.html.twig', []);
    }

    public function userPreferences()
    {
        return $this->render('control-sidebar/settings.html.twig', []);
    }
}
