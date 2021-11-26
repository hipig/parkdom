<?php

namespace Database\Factories;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DomainVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $domains = Domain::query()->pluck('domain', 'id')->toArray();
        $domainId = $this->faker->randomElement(array_keys($domains));
        $hostArr = [$domains[$domainId], 'www' . '.' . $domains[$domainId], Str::random(4) . '.' . $domains[$domainId]];

        $ip = $this->faker->ipv4();
        $location = geoip($ip);

        $deviceTypes = ['desktop', 'phone', 'table'];
        $deviceType = $this->faker->randomElement($deviceTypes);
        $devices = [
            'desktop' => [
                'Macintosh',
            ],
            'phone' => [
                'iPhone',
                'BlackBerry',
                'Pixel',
                'HTC',
                'Nexus',
                'Dell',
                'Motorola',
                'Samsung',
                'LG',
                'Sony',
                'Asus',
                'Xiaomi',
                'NokiaLumia',
                'Micromax',
                'Palm',
            ],
            'table' => [
                'iPad',
                'NexusTablet',
                'GoogleTablet',
                'SamsungTablet',
                'Kindle',
                'SurfaceTablet',
                'HPTablet',
                'BlackBerryTablet',
                'HTCtablet',
                'ToshibaTablet',
                'LGTablet',
                'LenovoTablet',
                'AinolTablet',
                'NokiaLumiaTablet',
                'SonyTablet',
                'SMiTTablet',
                'HuaweiTablet',
            ]
        ];

        $platforms = [
            'Windows',
            'Windows NT',
            'OS X',
            'Debian',
            'Ubuntu',
            'Macintosh',
            'OpenBSD',
            'Linux',
            'ChromeOS',
        ];

        $browsers = [
            'Opera Mini',
            'Opera',
            'Edge',
            'UCBrowser',
            'Vivaldi',
            'Chrome',
            'Firefox',
            'Safari',
            'IE',
            'Netscape',
            'Mozilla',
        ];

        return [
            'domain_id' => $domainId,
            'host' => $this->faker->randomElement($hostArr),
            'ip' => $ip,
            'country_code' => $location->iso_code,
            'country' => $location->country,
            'device' => $this->faker->randomElement($devices[$deviceType]),
            'device_type' => $deviceType,
            'platform' => $this->faker->randomElement($platforms),
            'browser' => $this->faker->randomElement($browsers),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
