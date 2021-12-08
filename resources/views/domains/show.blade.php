@extends('layouts.app')
@section('title', $domain->seo_title ?? "{$domain->domain} is on sale")
@section('keywords', $domain->seo_keywords)
@section('description', $domain->site_description)

@section('content')
    <main class="min-h-screen flex flex-col xl:flex-row space-y-12 xl:space-y-0 bg-gray-50 text-gray-700">
        <div class="w-full xl:w-7/12 flex flex-col justify-between bg-white relative">
            <div class="fixed bottom-0 xl:absolute md:bottom-auto md:top-0 right-0 p-4 z-50" x-data>
                <a href="#" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ lang('domain.more_domains') }}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 w-5 h-5"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="flex-1 min-h-0 flex items-center justify-center py-5 px-4 lg:px-8 xl:px-12">
                <div class="space-y-20 w-full">
                    <div class="flex flex-col items-center space-y-8">
                        <h1 class="text-5xl md:text-6xl font-bold bg-indigo-600 text-white px-4 py-1 rounded-md">{{ lang('domain.for_sale') }}</h1>
                        <h3 class="text-6xl sm:text-7xl md:text-8xl font-bold text-gray-900">{{ $domain->domain }}</h3>
                        @if($domain->price)
                            <div class="flex items-center text-4xl space-x-4"><span>Estimated value</span> <span class="text-3xl px-4 py-1 bg-red-500 text-white font-semibold rounded">{{ $domain->format_price }}</span></div>
                        @endif
                        <p class="text-2xl text-gray-500 text-center">{{ $domain->description }}</p>
                    </div>
                    <div class="md:px-10 lg:px-20 xl:px-28">
                        <div class="grid grid-cols-1 sm:grid-cols-3 text-gray-900 text-center divide-y sm:divide-y-0 sm:divide-x">
                            <dl class="space-y-1 p-5">
                                <dt class="text-4xl font-extrabold">
                                    3500+
                                </dt>
                                <dd class="text-sm uppercase tracking-wide font-semibold text-gray-600">
                                    {{ lang('domain.alexa_rank') }}
                                </dd>
                            </dl>
                            <dl class="space-y-1 p-5">
                                <dt class="text-4xl font-extrabold">
                                    260+
                                </dt>
                                <dd class="text-sm uppercase tracking-wide font-semibold text-gray-600">
                                    {{ lang('domain.total_back_links') }}
                                </dd>
                            </dl>
                            <dl class="space-y-1 p-5">
                                <dt class="text-4xl font-extrabold">
                                    175k+
                                </dt>
                                <dd class="text-sm uppercase tracking-wide font-semibold text-gray-600">
                                    {{ lang('domain.page_views') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 px-6">
                <div class="grid grid-cols-3 text-md">
                        <div class="flex items-center space-x-1">
                            @if($contactSetting->phone)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                <span>{{ $contactSetting->phone }}</span>
                            @endif
                        </div>
                        <div class="flex items-center justify-center space-x-1">
                            @if($contactSetting->email)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="mailto:{{ $contactSetting->email }}" class="hover:text-indigo-500 hover:opacity-90">{{ $contactSetting->email }}</a>
                            @endif
                        </div>
                    <div class="flex items-center justify-end space-x-1" x-data>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <a href="javascript:;" @click="$dispatch('dialog-show', {show: true})" class="hover:text-indigo-500 hover:opacity-90">{{ lang('domain.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full xl:w-5/12 flex flex-col justify-between">
            <div class="flex-1 min-h-0 flex items-center justify-center py-4 px-6 lg:px-10 xl:px-20">
                <div class="w-full">
                    <div class="space-y-6">
                        @if($domain->isAllowOffer())
                            <div class="space-y-4 text-center">
                                <h3 class="text-4xl text-gray-900 font-semibold">{{ lang('domain.offer_make_title') }}</h3>
                                <p class="text-lg text-gray-500">{{ lang('domain.offer_make_description') }}</p>
                            </div>
                            <div class="space-y-6" x-data="offerContainer" x-ref="offer-form">
                                <div class="space-y-4">
                                    <div class="space-y-1">
                                        <div class="relative">
                                            <input type="text" x-model="form.name" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-10 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ lang('domain.offer_name_placeholder') }}">
                                            <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="absolute right-0 inset-y-0 w-10 my-px mr-px pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                                <span>*</span>
                                            </div>
                                        </div>
                                        <template x-if="errors.name && errors.name.length > 0" hidden>
                                            <p class="text-sm text-red-500" x-text-="errors.name[0]"></p>
                                        </template>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="space-y-1">
                                            <div class="relative">
                                                <input type="text" x-model="form.email" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-10 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ lang('domain.offer_email_placeholder') }}">
                                                <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                </div>
                                                <div class="absolute right-0 inset-y-0 w-10 my-px mr-px pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                                    <span>*</span>
                                                </div>
                                            </div>
                                            <template x-if="errors.email && errors.email.length > 0" hidden>
                                                <p class="text-sm text-red-500" x-text-="errors.email[0]"></p>
                                            </template>
                                        </div>
                                        <div class="space-y-1">
                                            <div class="relative">
                                                <input type="text" x-model="form.phone" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-5 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ lang('domain.offer_phone_placeholder') }}">
                                                <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="relative">
                                            <input type="text" x-model="form.offer_price" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-24 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ lang('domain.offer_price_placeholder') }}">
                                            <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-2xl font-semibold text-gray-500">
                                                <span x-text="currencyPrefix"></span>
                                            </div>
                                            <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r font-semibold text-gray-500 bg-gray-50 border-l border-gray-200">
                                                <span x-text="currency"></span>
                                            </div>
                                            <div class="absolute right-0 inset-y-0 w-10 my-px mr-16 pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                                <span>*</span>
                                            </div>
                                        </div>
                                        <template x-if="errors.offer_price && errors.offer_price.length > 0" hidden>
                                            <p class="text-sm text-red-500" x-text-="errors.offer_price[0]"></p>
                                        </template>
                                    </div>
                                    @if($offerSetting->enableMewsCaptcha())
                                        <div class="space-y-1">
                                            <div class="flex items-center space-x-4">
                                                <div class="relative flex-grow">
                                                    <input type="text" x-model="form.captcha_code" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-10 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ lang('domain.offer_captcha_placeholder') }}">
                                                    <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <div class="absolute right-0 inset-y-0 w-10 my-px mr-px pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                                        <span>*</span>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <img class="cursor-pointer border border-gray-200 rounded" :src="captchaSrc" @click="refreshCaptcha" title="{{ lang('domain.offer_captcha_refresh') }}">
                                                </div>
                                            </div>
                                            <template x-if="errors.captcha_code && errors.captcha_code.length > 0" hidden>
                                                <p class="text-sm text-red-500" x-text-="errors.captcha_code[0]"></p>
                                            </template>
                                        </div>
                                    @endif
                                    <div class="space-y-1">
                                        <textarea x-model="form.content" class="w-full block placeholder-gray-400 border border-gray-200 rounded px-5 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="{{ lang('domain.offer_content_placeholder') }}"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" @click="submitOffer($dispatch)" class="w-full inline-flex justify-center items-center space-x-2 rounded border text-lg font-semibold focus:outline-none px-4 py-3 leading-6 border-indigo-600 bg-indigo-600 text-white hover:text-white hover:bg-indigo-700 hover:border-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-600 active:border-indigo-600 active:shadow-none">
                                        {{ lang('domain.offer_submit') }}
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="space-y-6">
                            @if($domainSetting->getBuyLinks())
                                <div class="flex items-center">
                                    <span aria-hidden="true" class="flex-grow bg-gray-200 rounded h-px"></span>
                                    <span class="text-sm font-medium mx-3 text-gray-400 uppercase">{{ lang('domain.offer_buy_links') }}</span>
                                    <span aria-hidden="true" class="flex-grow bg-gray-200 rounded h-px"></span>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                                @foreach($domainSetting->getBuyLinks() as $link)
                                    <a href="{{ \Illuminate\Support\Str::replace('{domain}', $domain->domain, $link['value']) }}" target="_blank" class="w-full inline-flex justify-center items-center rounded border text-lg  focus:outline-none px-4 py-3 leading-6 border-gray-300 bg-white text-gray-800 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:ring focus:ring-gray-500 focus:ring-opacity-50 active:bg-white active:white active:shadow-none">
                                        <span class="text-gray-400 mr-2">{{ $link['label_prefix'] ?? '' }}</span>
                                        <span class="font-semibold">{{ $link['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-2 text-gray-500 text-center">
                © 2021
                <a href="/" class="text-indigo-500 hover:opacity-90">{{ $domain->domain }}</a>
                {{ lang('domain.all_rights_reserved') }}
            </div>
        </div>
    </main>
    <div
        x-data="alertContainer"
        x-show="show"
        @alert-show.window="showAlert($event.detail)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="transform translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform translate-x-full"
        class="fixed top-24 right-8"
        x-cloak>
        <div class="p-4 rounded-md text-green-700 bg-green-100 shadow-md border border-green-400" @click="closeAlert">
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <h3 class="font-semibold" x-text="message"></h3>
            </div>
        </div>
    </div>
    <div
        x-data="contactDialogContainer"
        x-show="show"
        @dialog-show.window="showDialog($event.detail)"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0"
        x-transition:enter-end="transform opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="transform opacity-100"
        x-transition:leave-end="transform opacity-0"
        class="z-90 fixed inset-0 overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-60 p-4 lg:p-8"
    >
        <div
            class="flex flex-col rounded shadow-sm bg-white overflow-hidden w-full max-w-lg mx-auto"
            x-show="show"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-125"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-125"
            @click.away="closeDialog"
            x-cloak
        >
            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 flex justify-between items-center">
                <h3 class="font-medium">{{ lang('domain.contact_us') }}</h3>
                <div class="-my-4">
                    <button
                        type="button"
                        class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-transparent text-gray-600 hover:text-gray-400 focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:text-gray-600"
                        x-on:click="closeDialog"
                    >
                        <svg class="hi-solid hi-x inline-block w-4 h-4 -mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    </button>
                </div>
            </div>
            <div class="p-5 lg:p-6 flex-grow w-full">
                <div class="space-y-6">
                    <div class="space-y-1">
                        <label for="contact_name" class="font-medium text-gray-900">{{ lang('domain.contact_name') }}</label>
                        <input id="contact_name" x-model="form.name" class="w-full block border border-gray-200 rounded px-3 py-2 leading-6 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" placeholder="{{ lang('domain.contact_name_placeholder') }}" />
                        <template x-if="errors.name && errors.name.length > 0" hidden>
                            <p class="text-sm text-red-500" x-text-="errors.name[0]"></p>
                        </template>
                    </div>
                    <div class="space-y-1">
                        <label for="contact_email" class="font-medium text-gray-900">{{ lang('domain.contact_email') }}</label>
                        <input id="contact_email" x-model="form.email" class="w-full block border border-gray-200 rounded px-3 py-2 leading-6 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" placeholder="{{ lang('domain.contact_email_placeholder') }}" />
                        <template x-if="errors.email && errors.email.length > 0" hidden>
                            <p class="text-sm text-red-500" x-text-="errors.email[0]"></p>
                        </template>
                    </div>
                    <div class="space-y-1">
                        <label for="contact_content" class="font-medium text-gray-900">{{ lang('domain.contact_content') }}</label>
                        <textarea id="contact_content" x-model="form.content" class="w-full block border border-gray-200 rounded px-3 py-2 leading-6 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="{{ lang('domain.contact_content_placeholder') }}"></textarea>
                        <template x-if="errors.content && errors.content.length > 0" hidden>
                            <p class="text-sm text-red-500" x-text-="errors.content[0]"></p>
                        </template>
                    </div>
                    <div>
                        <button type="button" @click="submitContact" class="w-full inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-6 border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                            {{ lang('domain.contact_submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('offerContainer', () => ({
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    offer_price: '',
                    captcha_code: '',
                    content: ''
                },
                captchaSrc: '{{ captcha_src('offer') }}',
                errors: {},
                currencyList: [],
                currency: '',
                currencyPrefix: '',

                init() {
                    this.getCurrencyList()

                    this.$watch('currency', (currency) => {
                        let index = _.findKey(this.currencyList, { code: currency })
                        this.currencyPrefix = this.currencyList[index || 0].prefix
                    })
                },

                getCurrencyList() {
                    axios.get(`{{ route('api.currencies') }}`)
                        .then(res => {
                            this.currencyList = res.data
                            this.currency = '{{ $domain->currency }}'
                        })
                },

                refreshCaptcha() {
                    this.captchaSrc='/captcha/offer?'+Math.random()
                },

                submitOffer(dispatcher) {
                    axios.post('{{ route('api.domains.offers.store', $domain) }}', this.form)
                        .then(() => {
                            dispatcher('alert-show', {show: true, message: '{{ lang('domain.offer_submit_success_tips') }}'})
                            this.form = {
                                name: '',
                                email: '',
                                phone: '',
                                offer_price: '',
                                content: ''
                            }
                        })
                        .catch((err) => {
                            let res = err.response
                            if(res.status == 422) {
                                this.errors = res.data.errors
                            }
                            this.refreshCaptcha()
                        })
                }
            }))

            Alpine.data('alertContainer', () => ({
                show: false,
                message: '',

                init() {
                    this.$watch('show', show => {
                        if (show) {
                            let that = this
                            setTimeout(() => {
                                that.show = false
                            }, 3000)
                        }
                    })
                },

                showAlert(detail) {
                    this.show = !!detail.show
                    this.message = detail.message || ''
                },
                closeAlert() {
                    this.show = false
                }
            }))

            Alpine.data('contactDialogContainer', () => ({
                show: false,
                form: {
                    name: '',
                    email: '',
                    content: ''
                },
                errors: {},

                showDialog(detail) {
                    this.show = !!detail.show
                },
                closeDialog() {
                    this.show = false
                    this.errors = {}
                },

                submitContact(dispatcher) {
                    this.errors = {}
                    axios.post('{{ route('api.contacts.store') }}', this.form)
                        .then(() => {
                            this.show = false
                            dispatcher('alert-show', {show: true, message: '{{ lang('domain.contact_submit_success_tips') }}'})
                            this.form = {
                                name: '',
                                email: '',
                                content: ''
                            }
                        })
                        .catch((err) => {
                            let res = err.response
                            if(res.status == 422) {
                                this.errors = res.data.errors
                            }
                            this.refreshCaptcha()
                        })
                }
            }))

        })
    </script>
@endpush
