@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Case Documents</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            Upload Court Document
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('lawyer.documents.store',$legalCase) }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Document Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Document Type</label>
                    <select name="document_type" class="form-select" required>
                        <option>Complaint</option>
                        <option>Written Statement</option>
                        <option>Affidavit</option>
                        <option>Evidence</option>
                        <option>Medical Report</option>
                        <option>Police Report</option>
                        <option>Contract</option>
                        <option>Witness Statement</option>
                        <option>Appeal Petition</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Choose File</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <button
                    class="btn btn-primary">
                    Upload Document
                </button>

            </form>

        </div>
    </div>

    <div class="card">

        <div class="card-header">
            Uploaded Documents
        </div>

        <div class="card-body">

            <table class="table">

                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Uploaded</th>
                    <th>Download</th>
                </tr>
                </thead>

                <tbody>

                @forelse($legalCase->documents as $document)

                    <tr>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->document_type }}</td>
                        <td>{{ $document->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('lawyer.documents.download',$document) }}"
                               class="btn btn-success btn-sm">
                                Download
                            </a>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4">No documents uploaded.</td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection