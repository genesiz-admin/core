<?php
namespace Genesizadmin\GenesizCore\Domain\UI\Components;

abstract class Card
{
    protected string $title = 'Title';

    protected string $icon = '';

    protected string $infoText = 'Growth';

    protected string $color = 'success';

    protected bool $disableInfo = false;

    private array $data = [];

    public function __construct()
    {
        $this->data['title'] = $this->title;
        $this->data['icon'] = $this->icon;
        $this->data['color'] = $this->color;
    }

    public static function make()
    {
        return new static();
    }

    public function toArray(): array
    {
        $this->data['value'] = $this->count();
        $this->data['chart'] = [
            [
                'data' => $this->chart(),
            ],
        ];

        $this->data['hasChart'] = ! empty($this->chart());

        if (! $this->disableInfo) {
            $this->info();
        }

        return $this->data;
    }

    public function count()
    {
        return 0;
    }

    private function info()
    {
        $this->data['info'] = [
            'icon' => $this->trending() ? 'bi bi-graph-up-arrow' : 'bi bi-graph-down-arrow',
            'value' => $this->trend(),
            'text' => $this->infoText,
            'style' => $this->trending() ? 'text-success' : 'text-danger',
        ];
    }

    private function trending(): bool
    {
        return $this->trend() > -1;
    }

    public function trend()
    {
        return 0;
    }

    public function chart()
    {
        return [];
    }
}
