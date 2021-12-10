@props(['name', 'value' => null, 'placeholder' => null, 'type' => 'input'])

<div x-data="translateContainer">
    <nav class="flex items-center pl-2">
        @foreach(config('app.locales') as $code => $locale)
            <a href="javascript:;" @click="switchTab('{{ $code }}')" class="px-3 md:px-5 text-sm font-medium -mb-px flex items-center space-x-2 py-1.5 border border-b-0 rounded-t" :class="activeTab == '{{ $code }}' ? 'bg-white text-indigo-500 border-gray-200' : 'border-transparent'">
                {{ $locale }}
            </a>
        @endforeach
    </nav>
    <div class="border border-gray-200 p-2 rounded">
        @foreach(config('app.locales') as $code => $locale)
            <div x-show="activeTab == '{{ $code }}'">
                @if($type === 'input')
                    <input type="text" id="{{ $name }}_{{ $code }}" name="{{ $name }}[{{ $code }}]" value="{{ old(join('.', [$name, $code]), $value[$code] ?? '') }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ $placeholder ?? __(\Illuminate\Support\Str::ucfirst($name)) }}">
                @elseif($type === 'textarea')
                    <textarea id="{{ $name }}_{{ $code }}" name="{{ $name }}[{{ $code }}]" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="{{ $placeholder ?? __(\Illuminate\Support\Str::ucfirst($name)) }}">{{ old(join('.', [$name, $code]), $value[$code] ?? '') }}</textarea>
                @endif
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('translateContainer', () => ({
                activeTab: '{{ config('app.locales')[0]['code'] ?? 'en' }}',

                switchTab(value) {
                    this.activeTab = value
                }
            }))
        })
    </script>
@endpush
