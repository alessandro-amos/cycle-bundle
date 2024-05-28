<?php

namespace Alms\Bundle\CycleBundle\Behavior\Attribute;

use Alms\Bundle\CycleBundle\Behavior\Listener\Uuid4 as Listener;
use Attribute;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;


#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE), NamedArgumentConstructor]
class Uuid4 extends BaseUuid
{
    public function __construct(
        string $field = 'id',
        ?string $column = null,
        bool $nullable = false
    ) {
        $this->field = $field;
        $this->column = $column;
        $this->nullable = $nullable;
    }

    protected function getListenerClass(): string
    {
        return Listener::class;
    }

    protected function getListenerArgs(): array
    {
        return [
            'field' => $this->field,
            'nullable' => $this->nullable
        ];
    }
}