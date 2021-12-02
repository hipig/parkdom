<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateDomainSetting extends SettingsMigration
{
    public function up(): void
    {
        $defaultLinks = [
            [
                'title' => 'Dan.com',
                'label' => 'Buy with|Dan.com',
                'value' => 'https://dan.com/zh-cn/buy-domain/{domain}'
            ],
            [
                'title' => 'Afternic.com',
                'label' => 'Buy with|Afternic.com',
                'value' => 'https://www.afternic.com/domain/{domain}'
            ],
            [
                'title' => '4.cn',
                'label' => 'Buy with|4.cn',
                'value' => 'https://www.4.cn/search/detail/domain/{domain}'
            ],
            [
                'title' => 'Sedo.com',
                'label' => 'Buy with|Sedo.com',
                'value' => 'https://sedo.com/search/details/?domain={domain}&trackingRequestId=857693374&origin=search&language=en-US&p=2_1&trackingOrigin=1&fromExactMatch=4'
            ]
        ];

        $this->migrator->add('domain.currency', 'USD');
        $this->migrator->add('domain.allow_offer', 1);
        $this->migrator->add('domain.min_price', '');
        $this->migrator->add('domain.buy_links', json_encode($defaultLinks));
    }
}
