<?php

namespace App\Twig;

use Symfony\Component\Intl\Intl;
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
     * @param string $inLocale
     * @return string
     */
    public function getLanguageName(string $language)
    {
        return ucfirst(Intl::getLocaleBundle()->getLocaleName($language, $language));
    }
}
