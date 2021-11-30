@component('mail::message')
# 域名询价通知

- 域名：{{ $offer->domain->domain }}
- 联系人：{{ $offer->name }}
- 邮箱：{{ $offer->email }}
- 电话：{{ $offer->phone }}
- 报价：{{ $offer->format_offer_price }}
- IP：{{ $offer->ip }}
- 来源国家：{{ $offer->country }}
- 备注：{{ $offer->content }}
- 时间：{{ $offer->created_at }}

@component('mail::button', ['url' => route('admin.dashboard')])
详细信息
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
