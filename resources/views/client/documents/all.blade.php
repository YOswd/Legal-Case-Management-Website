@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    My Documents
</h1>

<div class="bg-white rounded shadow p-6">

<table class="w-full">

<thead>
<tr class="border-b">
    <th class="p-3 text-left">Title</th>
    <th class="p-3 text-left">Type</th>
    <th class="p-3 text-left">Download</th>
</tr>
</thead>

<tbody>

@forelse($documents as $document)

<tr class="border-b">

    <td class="p-3">
        {{ $document->title }}
    </td>

    <td class="p-3">
        {{ $document->document_type }}
    </td>

    <td class="p-3">
        <a href="{{ route('client.documents.download', $document) }}"
           class="text-blue-600">
            Download
        </a>
    </td>

</tr>

@empty

<tr>
    <td colspan="3" class="p-4 text-center">
        No documents uploaded yet.
    </td>
</tr>

@endforelse

</tbody>

</table>

</div>

@endsection