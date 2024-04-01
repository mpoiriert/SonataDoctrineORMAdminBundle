<?php

namespace Sonata\DoctrineORMAdminBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

class PreObjectDeleteBatchEvent extends Event
{
    private bool $shouldDelete = true;
    public function __construct(
        private string $className,
        private object $object
    )
    {
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getObject(): object
    {
        return $this->object;
    }

    public function preventDelete(): void
    {
        $this->shouldDelete = false;
        $this->stopPropagation();
    }

    public function shouldDelete(): bool
    {
        return $this->shouldDelete;
    }
}
