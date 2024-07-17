<?php

// Add the ID of articles to the list view label.
$GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'][] = 'id';
$GLOBALS['TL_DCA']['tl_article']['list']['label']['format']= '%s <span class="label-info">[%s, ID: %s]</span>';
