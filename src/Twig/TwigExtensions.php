<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
     * @param string $inLocale
     * @return string
     */
    public function getLanguageName(string $language)
    {
        return ucfirst(Locales::getName($language, $language));
    }
}
