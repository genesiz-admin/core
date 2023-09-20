<?php

namespace Genesizadmin\GenesizCore\Domain\UI;

use Genesizadmin\GenesizCore\Domain\Enums\StyleType;
use Genesizadmin\GenesizCore\Domain\UI\Components\ActionButton;
use Genesizadmin\GenesizCore\Domain\UI\Components\Alert;
use Genesizadmin\GenesizCore\Domain\UI\Components\Heading;
use Genesizadmin\GenesizCore\Domain\UI\Components\NavigateBack;
use Genesizadmin\GenesizCore\Domain\UI\Components\TabView;
use Genesizadmin\GenesizCore\Domain\UI\Components\Toast;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait PageFeatures
{
    use WithInertia;

    public function pageHeading($title, $subtitle = ''): void
    {
        Heading::make($title, $subtitle);
    }

    public function navigateBack($url = null): void
    {
        NavigateBack::url($url);
    }

    public function pagePrimaryAction($label, $action): void
    {
        ActionButton::make($label, $action, 'primary');
    }

    public function pageSecondaryAction($label, $action): void
    {
        ActionButton::make($label, $action);
    }

    public function pageCards(array $cards)
    {
        $cardsData = [];

        foreach ($cards as $card) {
            $cardsData[] = $card::make()->toArray();
        }

        self::mergeShareData('cards', $cardsData);
    }

     public function tabs($array, $data = [], $key = 'default')
    {
        $tabs = [];

        $sharedTabs = TabView::$shared[$key] ?? [];
        $array = array_merge($array, $sharedTabs);

        // remove nulled elements from tabs
        $array = array_filter($array);

        throw_if(empty($array), 'No tabs were registered !');

        foreach ($array as $t) {
            $builder = new $t($data);

            if ($builder->visible()) {
                $tabs[] = [
                    'label' => $builder->label,
                    'slug' => Str::slug($builder->label),
                    'builder' => $t,
                    'link' => '?tab='.Str::slug($builder->label),
                    'order' => $builder->getOrder(),
                ];
            }
        }

        // sort tabs
        $tabs = Arr::sort($tabs, function ($val) {
            return $val['order'];
        });

        // set default tab
        request()->mergeIfMissing([
            'tab' => $tabs[0]['slug'],
        ]);

        foreach ($tabs as $key => $tab) {
            if (request()->get('tab') == $tab['slug']) {
                $tabs[$key]['activeClass'] = 'nav-link active';
            }

            if (request()->get('tab') == $tab['slug'] && $tab['builder'] != null) {
                inertia()->share('_tabs', $tabs);

                return (new $tab['builder']($data))->render();
            }
        }
    }

    public function toastSuccess($description = '')
    {
        Toast::make('Success',$description)
        ->setType(StyleType::Success)
        ->show();
    }

    public function toastWarning($description = '')
    {
        Toast::make('Warning',$description, 'warning')
        ->setType(StyleType::Warning)
        ->show();
    }

    public function toastInfo($description = '')
    {
        Toast::make('Info',$description, 'info')
        ->setType(StyleType::Info)
        ->show();
    }

    public function toastError($description = '')
    {
        Toast::make('Error',$description, 'error')
        ->setType(StyleType::Error)
        ->show();
    }

    public function pageAlert($message,$description=null)
    {

        Alert::make($message,$description)
            ->closeable()
            ->show();
    }


}
