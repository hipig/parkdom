@extends('layouts.app')
@section('title', __('Dashboard'))

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        10
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('New Offers') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-currency-dollar class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="#" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Offers') }}
            </a>
        </div>
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        0
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('Total Domains') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-globe-alt class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="#" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Domains') }}
            </a>
        </div>
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        5
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('Total Pages') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-document-text class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="#" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Pages') }}
            </a>
        </div>
    </div>
@endsection
