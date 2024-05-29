<?php

namespace Alms\Bundle\CycleBundle\Behavior\Listener;

use Cycle\ORM\Entity\Behavior\Attribute\Listen;
use Cycle\ORM\Entity\Behavior\Event\Mapper\Command\OnCreate;
use Symfony\Component\Uid\Uuid;
use function Symfony\Component\String\s;

final class Uuid7
{
    public function __construct(
        private readonly string $field = 'uuid',
        private readonly bool   $nullable = false
    ) {
    }

    #[Listen(OnCreate::class)]
    public function __invoke(OnCreate $event): void
    {
        if (!$this->nullable && !isset($event->state->getData()[$this->field])) {
            $event->state->register($this->field, Uuid::v7());
        }
    }
}