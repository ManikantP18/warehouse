@extends('layouts.admin')

@section('page-title')
    {{ __('Edit Labor Price') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('labor-prices.list') }}">{{ __('Labor Prices') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('labor-prices.update', $labor_price->id) }}" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="module_type" class="form-label">{{ __('Module Type') }} <span class="text-danger">*</span></label>
                                    <select name="module_type" id="module_type" class="form-control" required>
                                        <option value="">{{ __('Select Module Type') }}</option>
                                        <option value="staging" {{ $labor_price->module_type == 'staging' ? 'selected' : '' }}>{{ __('Staging') }}</option>
                                        <option value="grading" {{ $labor_price->module_type == 'grading' ? 'selected' : '' }}>{{ __('Grading') }}</option>
                                        <option value="packing" {{ $labor_price->module_type == 'packing' ? 'selected' : '' }}>{{ __('Packing') }}</option>
                                    </select>
                                    <div class="invalid-feedback">{{ __('Please select a module type.') }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price_per_kwintal" class="form-label">{{ __('Price per Kwintal (₹)') }} <span class="text-danger">*</span></label>
                                    <input type="number" name="price_per_kwintal" id="price_per_kwintal" class="form-control" step="0.01" min="0" value="{{ $labor_price->price_per_kwintal }}" required>
                                    <div class="invalid-feedback">{{ __('Please enter a valid price.') }}</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="{{ __('Enter description (optional)') }}">{{ $labor_price->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('labor-prices.list') }}" class="btn btn-secondary me-2">{{ __('Cancel') }}</a>
                                    <button type="submit" class="btn btn-primary">{{ __('Update Labor Price') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
