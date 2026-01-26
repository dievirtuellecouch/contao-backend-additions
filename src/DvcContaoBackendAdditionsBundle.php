<?php

declare(strict_types=1);

namespace Dvc\ContaoBackendAdditionsBundle;

use Dvc\ContaoBackendAdditionsBundle\DependencyInjection\DvcContaoBackendAdditionsExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DvcContaoBackendAdditionsBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DvcContaoBackendAdditionsExtension();
    }
}
