<?php

namespace App\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TwigPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $locales = $container->getParameter('app_locales');

        $locales = explode('|', trim($locales));
        if (empty($locales)) {
            throw new \UnexpectedValueException('The list of supported locales must not be empty.');
        }

        $twigDefinition = $container->getDefinition('twig');
        $twigDefinition->addMethodCall('addGlobal', ['app_locales', $locales]);
    }
}
