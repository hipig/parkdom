@extends('layouts.admin')
@section('title', joinTitle([__('General'), __('Settings')]))

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3 class="font-medium">{{ __('General') }}</h3>
        </div>
        <form action="{{ route('admin.settings.general') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="site_name" class="text-gray-900 font-semibold">{{ __('Site Name') }}</label>
                        <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Site Name') }}">
                    </div>
                    <div class="space-y-1">
                        <label for="site_keywords" class="text-gray-900 font-semibold">{{ __('Site Keywords') }}</label>
                        <input type="text" id="site_keywords" name="site_keywords" value="{{ old('site_keywords', $setting->site_keywords) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Site Keywords') }}">
                    </div>
                    <div class="space-y-1">
                        <label for="site_description" class="text-gray-900 font-semibold">{{ __('Site Description') }}</label>
                        <textarea id="site_description" name="site_description" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="{{ __('Site Description') }}">{{ old('site_description', $setting->site_description) }}</textarea>
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
