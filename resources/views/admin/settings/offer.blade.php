@extends('layouts.admin')
@section('title', joinTitle([__('Offer'), __('Settings')]))

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="settingContainer">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3 class="font-medium">{{ __('Offer') }}</h3>
        </div>
        <form action="{{ route('admin.settings.offer') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="captcha" class="text-gray-900 font-semibold">{{ __('Captcha') }}</label>
                        <select id="captcha" name="captcha" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="disable" {{ old('captcha', $setting->captcha) === 'disable' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                            <option value="mews/captcha"{{ old('captcha', $setting->captcha) === 'mews/captcha' ? 'selected' : '' }}>{{ __('Captcha') }}</option>
                        </select>
                        <p class="text-sm text-gray-500">{{ __('When submitting a quotation, enable the captcha.') }}</p>
                    </div>
                    <div class="space-y-1">
                        <label for="offer_status" class="text-gray-900 font-semibold">{{ __('Need notice') }}</label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="is_notify" value="1" x-model="isNotify" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                <span class="ml-2">{{ __('Enable') }}</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="is_notify" value="2" x-model="isNotify" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                <span class="ml-2">{{ __('Disable') }}</span>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500">{{ __('Whether to notify if has new offer.') }}</p>
                    </div>
                    <div class="space-y-1" x-show="isNotify == 1">
                        <label for="notify_email" class="text-gray-900 font-semibold">{{ __('Notice Email') }}</label>
                        <input type="text" id="notify_email" name="notify_email" value="{{ old('notify_email', $setting->notify_email) }}" class="block border border-gray-200 {{ $disableInput ? 'bg-gray-100 opacity-75' : '' }} rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Notice Email') }}" {{ $disableInput ? 'disabled' : '' }}>
                        @if($disableInput)
                            <p class="text-sm text-gray-500">{!! __('Please configure :mail first.', ['mail' => '<a href="' . route('admin.settings.mail') . '" class="text-indigo-600 hover:text-indigo-700 hover:underline">'. __('Mail') .'</a>']) !!}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Save') }}</span>
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('settingContainer', () => ({
                isNotify: '{{ old('is_notify', $setting->is_notify ?? 2) }}'
            }))
        })
    </script>
@endpush
