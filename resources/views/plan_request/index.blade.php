@extends('layouts.admin')
@section('page-title')
    {{ __('Plan Request') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Plan Request') }}</li>
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Plan Request') }}</h5>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">

                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Plan Name') }}</th>
                                    <th>{{ __('Total Users') }}</th>
                                    <th>{{ __('Total Customers') }}</th>
                                    <th>{{ __('Total Vendors') }}</th>
                                    <th>{{ __('Duration') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($plan_requests->count() > 0)
                                    @foreach ($plan_requests as $prequest)
                                        <tr>
                                            <td>
                                                <div class="font-style font-weight-bold">{{ $prequest->user->name }}</div>
                                            </td>
                                            <td>
                                                <div class="font-style font-weight-bold">{{ $prequest->plan->name }}</div>
                                            </td>
                                            <td>

                                                <div class="font-weight-bold">{{ $prequest->plan->max_users }}</div>

                                            </td>
                                            <td>
                                                <div class="font-weight-bold">{{ $prequest->plan->max_customers }}</div>

                                            </td>
                                            <td>
                                                <div class="font-weight-bold">{{ $prequest->plan->max_venders }}</div>

                                            </td>
                                            <td>
                                                <div class="font-style font-weight-bold">
                                                    {{ __('One ') . $prequest->plan->duration }}
                                                </div>
                                            </td>
                                            <td>{{ App\Models\Utility::getDateFormated($prequest->created_at, true) }}</td>
                                            <td>
                                                <div>
                                                    <!-- <a href="{{ route('response.request', [$prequest->id, 1]) }}"
                                                        class="btn btn-success btn-sm me-2"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __('Approve') }}"
                                                         >
                                                        <i class="ti ti-check"></i>
                                                    </a> -->
                                                    <a href="{{ route('response.request', [$prequest->id, 1]) }}"
                                                        class="btn btn-success btn-sm me-2"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __('Approve') }}">
                                                        <i class="ti ti-check"></i>
                                                    </a>
                                                    <a href="{{ route('response.request', [$prequest->id, 0]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __('Cancel') }}" >
                                                        <i class="ti ti-x"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th scope="col" colspan="7">
                                            <h6 class="text-center">{{ __('No Manually Plan Request Found.') }}</h6>
                                        </th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
