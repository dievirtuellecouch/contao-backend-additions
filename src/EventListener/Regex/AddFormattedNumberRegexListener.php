<?php

namespace DVC\BackendAdditions\EventListener\Regex;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Widget;
use Symfony\Contracts\Translation\TranslatorInterface;

#[AsHook('addCustomRegexp')]
class AddFormattedNumberRegexListener
{
    public const NAME = 'formatted_number';

    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function __invoke(string $regexp, $input, Widget $widget): bool
    {
        if ($regexp !== self::NAME) {
            return false;
        }

        $expression = '/[0-9\.,]+/';

        if (!\preg_match($expression, $input)) {
            $widget->addError($this->translator->trans(
                'XPT.formattedNumberRegex',
                [],
                'contao_exception'
            ));

            return true;
        }

        return false;
    }
}
