<?php

namespace App\Twig;

use Symfony\Component\Intl\Locales;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigExtensions extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new TwigFilter('language', [$this, 'getLanguageName']),
        ];
    }

    /**
     * @param string $language
     * @return string
     */
    public function getLanguageName(string $language)
    {
        return ucfirst(Locales::getName($language, $language));
    }
}
