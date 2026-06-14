<?php

declare(strict_types=1);

namespace Dvc\ContaoBackendAdditionsBundle\EventListener;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class BackendAssetsListener
{
    public function __construct(
        private readonly ScopeMatcher $scopeMatcher,
    ) {
    }

    #[AsEventListener(event: KernelEvents::REQUEST)]
    public function __invoke(RequestEvent $event): void
    {
        if (!$this->scopeMatcher->isBackendMainRequest($event)) {
            return;
        }

        $GLOBALS['TL_CSS']['dvc_backend_additions'] = 'bundles/dvccontaobackendadditions/backend.css|static';
    }
}
