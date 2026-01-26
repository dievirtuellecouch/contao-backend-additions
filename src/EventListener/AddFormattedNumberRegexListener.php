<?php

declare(strict_types=1);

namespace Dvc\ContaoBackendAdditionsBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Widget;
use Symfony\Contracts\Translation\TranslatorInterface;

#[AsHook('addCustomRegexp')]
class AddFormattedNumberRegexListener
{
    public const NAME = 'formatted_number';

    public function __construct(
        private readonly TranslatorInterface $translator
    ) {
    }

    public function __invoke(string $regexp, mixed $input, Widget $widget): bool
    {
        if ($regexp !== self::NAME) {
            return false;
        }

        $expression = '/[0-9\.,]+/';

        if (!\preg_match($expression, (string) $input)) {
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
