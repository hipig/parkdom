@foreach($visits as $visit)
    <td class="py-3 px-6">
        <a href="{{ route('admin.domains.show', ['domain' => $visit->domain_id]) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $visit->domain }}</a>
    </td>
    <td class="py-3 px-6 text-center">
        <div class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded text-gray-700 bg-gray-100">{{ $visit->count }}</div>
    </td>
@endforeach
