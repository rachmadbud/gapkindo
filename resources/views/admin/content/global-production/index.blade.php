@extends('admin.template')

@section('title', __('global.guest.productionGlobal'))

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('global.guest.productionGlobal') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active">{{ __('global.guest.productionGlobal') }}</li>
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
                    <h3 class="card-title">{{ __('global.guest.globalProductionUploadTitle') }}</h3>
                </div>
                <form action="{{ route('admin.globalProduction.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <p class="text-muted">{{ __('global.guest.globalProductionUploadDescription') }}</p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="excel">{{ __('global.guest.excelFile') }}</label>
                                <div class="mb-2">
                                    <a class="btn btn-outline-success btn-sm" href="{{ route('admin.globalProduction.template') }}">
                                        <i class="fas fa-download mr-1"></i> {{ __('global.guest.downloadExcelTemplate') }}
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
                                <small class="form-text text-muted">{{ __('global.guest.excelFormatLimit') }}</small>
                                @error('excel')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="month">{{ __('global.guest.period') }}</label>
                                <select class="form-control @error('month') is-invalid @enderror" id="month" name="month" required>
                                    <option value="">{{ __('global.guest.selectMonth') }}</option>
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
                                <label for="year">{{ __('global.guest.year') }}</label>
                                <input
                                    class="form-control @error('year') is-invalid @enderror"
                                    id="year"
                                    name="year"
                                    type="text"
                                    inputmode="numeric"
                                    pattern="[0-9]{4}"
                                    maxlength="4"
                                    placeholder="{{ __('global.guest.exampleYear') }}"
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
                            <i class="fas fa-upload mr-1"></i> {{ __('global.guest.uploadAndSave') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('global.guest.availableGlobalProductionData') }}</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('global.guest.period') }}</th>
                                <th>{{ __('global.guest.numberCountries') }}</th>
                                <th>{{ __('global.guest.sourceFile') }}</th>
                                <th>{{ __('global.guest.lastUpdated') }}</th>
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
                                    <td class="text-center text-muted" colspan="4">{{ __('global.guest.noGlobalProductionData') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
