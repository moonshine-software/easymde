<?php

namespace MoonShine\EasyMde\Tests\Unit;

use MoonShine\EasyMde\Fields\Markdown;
use MoonShine\EasyMde\Tests\TestCase;
use MoonShine\UI\Fields\Textarea;

class EasyMdeFieldTest extends TestCase
{
    private Markdown $field;

    protected function setUp(): void {
        parent::setUp();

        $this->field = Markdown::make('Text');
    }

    public function testThatTextareaIsParent(): void
    {
        $this->assertInstanceOf(Textarea::class, $this->field);
    }
}
