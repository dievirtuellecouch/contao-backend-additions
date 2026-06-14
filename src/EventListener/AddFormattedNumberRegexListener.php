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

    private const EXPRESSION = '/^(?:\d+|\d{1,3}(?:\.\d{3})+)(?:,\d+)?$/';

    public function __construct(
        private readonly TranslatorInterface $translator
    ) {
    }

    public function __invoke(string $regexp, mixed $input, Widget $widget): bool
    {
        if ($regexp !== self::NAME) {
            return false;
        }

        $input = trim((string) $input);

        if ('' === $input) {
            return true;
        }

        if (!\preg_match(self::EXPRESSION, $input)) {
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
