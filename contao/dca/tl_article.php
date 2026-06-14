<?php

declare(strict_types=1);

// Add the ID of articles to the list view label.
$GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'] ??= [];

if (!\in_array('id', $GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'], true)) {
    $GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'][] = 'id';
}

$GLOBALS['TL_DCA']['tl_article']['list']['label']['format'] = '%s <span class="subtle">[%s, ID: %s]</span>';
