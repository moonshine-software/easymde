<?php

declare(strict_types=1);

namespace MoonShine\EasyMde\Fields;

use Illuminate\View\View;
use JsonException;
use MoonShine\AssetManager\Css;
use MoonShine\AssetManager\Js;
use MoonShine\UI\Fields\Textarea;

class Markdown extends Textarea
{
    protected string $view = 'moonshine-easymde::fields.markdown';

    protected array $options = [];

    protected array $reservedOptions = [
        'element',
        'renderingConfig',
    ];

    protected function assets(): array
    {
        return [
            Css::make('vendor/moonshine-easymde/easymde.css'),
            Js::make('vendor/moonshine-easymde/easymde.js'),
        ];
    }

    /**
     * @throws JsonException
     */
    public function addOption(string $name, string|int|float|bool|array $value): self
    {
        if (in_array($name, $this->reservedOptions, true)) {
            return $this;
        }

        if (is_string($value) && str($value)->isJson()) {
            $value = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        }

        $this->options[$name] = $value;

        return $this;
    }

    public function getOptions(): array
    {
        return array_merge(config('moonshine_easymde', []), $this->options);
    }

    /**
     * @throws JsonException
     */
    public function toolbar(string|bool|array $toolbar): self
    {
        $this->addOption('toolbar', $toolbar);

        return $this;
    }

    protected function resolvePreview(): View|string
    {
        if ($this->isUnescape()) {
            return parent::resolvePreview();
        }

        return (string) str()->markdown(
            $this->toFormattedValue() ?? ''
        );
    }

    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    protected function viewData(): array
    {
        return [
            'options' => json_encode($this->getOptions(), JSON_THROW_ON_ERROR),
        ];
    }
}
