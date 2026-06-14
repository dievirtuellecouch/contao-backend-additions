<?php

declare(strict_types=1);

use Dvc\ContaoBackendAdditionsBundle\EventListener\AddFormattedNumberRegexListener;

$GLOBALS['TL_DCA']['tl_form_field']['fields']['rgxp']['options'] ??= [];

if (!\in_array(AddFormattedNumberRegexListener::NAME, $GLOBALS['TL_DCA']['tl_form_field']['fields']['rgxp']['options'], true)) {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rgxp']['options'][] = AddFormattedNumberRegexListener::NAME;
}
