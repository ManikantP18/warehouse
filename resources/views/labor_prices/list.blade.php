@extends('layouts.admin')
@php
    $profile = asset(Storage::url('uploads/avatar/'));
@endphp

@section('page-title')
    {{ __('Manage Labor Prices') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Labor Prices') }}</li>
@endsection

@section('action-btn')
    <div class="d-flex">
        <a href="{{ route('labor-prices.create') }}" class="btn btn-sm btn-primary me-2" data-bs-toggle="tooltip" title="{{ __('Create Labor Price') }}">
            <i class="ti ti-plus"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('Module Type') }}</th>
                                    <th>{{ __('Price per Kwintal') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($labor_prices as $price)
                                    <tr>
                                        <td>
                                            <span class="badge bg-primary">{{ ucfirst($price->module_type) }}</span>
                                        </td>
                                        <td>₹{{ number_format($price->price_per_kwintal, 2) }}</td>
                                        <td>{{ $price->description ?? '-' }}</td>
                                        <td>
                                            @if($price->is_active)
                                                <span class="badge bg-success">{{ __('Active') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $price->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="{{ route('labor-prices.edit', $price->id) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                                    <i class="ti ti-pencil text-white"></i>
                                                </a>
                                            </div>
                                            <div class="action-btn bg-danger ms-2">
                                                <a href="{{ route('labor-prices.delete', $price->id) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{ __('Delete') }}" onclick="return confirm('Are you sure you want to delete this price?')">
                                                    <i class="ti ti-trash text-white"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
