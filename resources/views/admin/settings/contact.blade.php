@extends('layouts.admin')
@section('title', joinTitle([__('Social'), __('Settings')]))

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="settingContainer">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3 class="font-medium">{{ __('Social') }}</h3>
        </div>
        <form action="{{ route('admin.settings.contact') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="flex items-center space-x-6">
                        @foreach($setting->toArray() as $key => $value)
                            <button type="button" @click="switchContact('{{ $key }}')" class="px-4 py-1.5 border-2 rounded capitalize" :class="[activeContact === '{{ $key }}' ? 'border-indigo-700 text-indigo-700 font-semibold' : 'border-gray-200 text-gray-900']">{{ $key }}</button>
                        @endforeach
                    </div>
                    @foreach($setting->toArray() as $key => $value)
                        <div class="space-y-1" x-show="activeContact === '{{ $key }}'">
                            <label for="{{ $key }}" class="text-gray-900 font-semibold capitalize">{{ $key }}</label>
                            <input type="text" id="{{ $key }}" name="{{ $key }}" value="{{ old($key, $value) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入{{ \Illuminate\Support\Str::ucfirst($key) }}">
                        </div>
                    @endforeach
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
                activeContact: 'phone',

                switchContact(value) {
                    this.activeContact = value
                }
            }))
        })
    </script>
@endpush
