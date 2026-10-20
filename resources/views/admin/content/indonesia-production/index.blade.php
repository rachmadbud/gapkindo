@extends('admin.template')

@section('title', 'Production in Indonesia')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Production in Indonesia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">Production in Indonesia</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Upload production data</h3>
                </div>
                <form action="{{ route('admin.indonesiaProduction.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <p class="text-muted">
                            Upload an Excel file containing production totals by province in tonnes.
                            Uploading the same month and year replaces the existing data for that period.
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="excel">Excel file</label>
                                <div class="mb-2">
                                    <a class="btn btn-outline-success btn-sm" href="{{ route('admin.indonesiaProduction.template') }}">
                                        <i class="fas fa-download mr-1"></i> Download sample file
                                    </a>
                                </div>
                                <input
                                    class="form-control-file @error('excel') is-invalid @enderror"
                                    id="excel"
                                    name="excel"
                                    type="file"
                                    accept=".xlsx,.xls"
                                    required
                                >
                                <small class="form-text text-muted">.xlsx or .xls format, maximum 10 MB.</small>
                                @error('excel')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="month">Month</label>
                                <select class="form-control @error('month') is-invalid @enderror" id="month" name="month" required>
                                    <option value="">Select month</option>
                                    @foreach ($months as $monthNumber => $monthName)
                                        <option value="{{ $monthNumber }}" {{ old('month') == $monthNumber ? 'selected' : '' }}>
                                            {{ $monthName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('month')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="year">Year</label>
                                <input
                                    class="form-control @error('year') is-invalid @enderror"
                                    id="year"
                                    name="year"
                                    type="text"
                                    inputmode="numeric"
                                    pattern="[0-9]{4}"
                                    maxlength="4"
                                    placeholder="Example: 2026"
                                    value="{{ old('year', now()->year) }}"
                                    required
                                >
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-upload mr-1"></i> Upload and save data
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Available production data</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Number of provinces</th>
                                <th>Source file</th>
                                <th>Last updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datasets as $dataset)
                                <tr>
                                    <td>{{ $months[$dataset->month] }} {{ $dataset->year }}</td>
                                    <td>{{ $dataset->productions_count }}</td>
                                    <td>{{ $dataset->source_filename }}</td>
                                    <td>{{ $dataset->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="4">No production data has been uploaded.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
