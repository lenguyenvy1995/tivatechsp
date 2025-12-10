<?php

use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Widget\Forms\WidgetForm;

class MapWidgetWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Map By Tivatech'),
            'description' => __('Nhúng Bản Đồ Vào Trong Trang Web Của Bạn'),
        ]);
    }
    protected function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add('title', TextField::class, TextFieldOption::make()
                ->label(__('Title'))
                ->placeholder(__('Enter widget title')))
            ->add('content', TextareaField::class, TextareaFieldOption::make()
                ->label(__('Ifame'))
                ->rows(4)
                ->placeholder(__('Enter widget Ifame')));
    }

    protected function data(): array|Collection
    {
        return [];
    }
}
