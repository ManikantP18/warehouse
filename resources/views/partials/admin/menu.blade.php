@php
    use \App\Models\Utility;
    $logo = \App\Models\Utility::get_file('uploads/logo/');

    if (\Auth::user()->type == 'super admin') {
        $company_logo = Utility::get_superadmin_logo();
    } else {
        $company_logo = Utility::get_company_logo();
    }

    $mode_setting = \App\Models\Utility::getLayoutsSetting();

    $emailTemplate = App\Models\EmailTemplate::first();
@endphp

{{-- @if ((isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on') || env('SITE_RTL') == 'on') --}}
{{--    <nav class="dash-sidebar light-sidebar transprent-bg"> --}}
{{-- @else --}}
{{--    <nav class="dash-sidebar light-sidebar"> --}}
{{-- @endif --}}
<nav
    class="dash-sidebar light-sidebar {{ isset($mode_setting['cust_theme_bg']) && $mode_setting['cust_theme_bg'] == 'on' ? 'transprent-bg' : '' }}">
    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="" class="b-brand">
                <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') . '?' . time() }}"
                    alt="{{ config('app.name', 'AccountGo') }}" class="logo logo-lg">
            </a>
        </div>

        <div class="navbar-content">
            <ul class="dash-navbar">
                {{-- -------  Dashboard ---------- --}}
                <li class="dash-item ">
                    {{-- @can('show dashboard') --}}
                    @if (\Auth::guard('customer')->check())
                        <a href="{{ route('customer.dashboard') }}"
                            class="dash-link {{ Request::route()->getName() == 'customer.dashboard' ? ' active' : '' }}">
                            <span class="dash-micon"><i class="ti ti-home"></i></span>
                            <span class="dash-mtext">{{ __('Dashboard') }}</span>
                        </a>
                    @elseif(\Auth::guard('vender')->check())
                        <a href="{{ route('vender.dashboard') }}"
                            class="dash-link {{ Request::route()->getName() == 'vender.dashboard' ? ' active' : '' }}">
                            <span class="dash-micon"><i class="ti ti-home"></i></span>
                            <span class="dash-mtext">{{ __('Dashboard') }}</span>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="dash-link {{ Request::route()->getName() == 'dashboard' ? ' active' : '' }}">
                            <span class="dash-micon"><i class="ti ti-home"></i></span>
                            <span class="dash-mtext">{{ __('Dashboard') }}</span>
                        </a>
                    @endif
                    {{-- @endcan --}}
                </li>

                @if (Gate::check('manage customer proposal'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'customer.proposal' || Request::segment(1) == 'customer.retainer' ? ' active dash-trigger' : '' }}">
                        <a href="#!" class="dash-link "><span class="dash-micon"><i
                                    class="ti ti-building-bank"></i></span><span
                                class="dash-mtext">{{ __('Presale') }}</span>
                            <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul
                            class="dash-submenu {{ Request::segment(1) == 'customer.proposal' || Request::segment(1) == 'customer.retainer' ? 'show' : '' }}">
                            @can('manage customer proposal')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'customer.proposal' || Request::route()->getName() == 'customer.proposal.show' ? ' active' : '' }}">
                                    <a class="dash-link" href="{{ route('customer.proposal') }}">{{ __('Proposal') }}</a>
                                </li>
                            @endcan
                            @can('manage customer proposal')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'customer.retainer' || Request::route()->getName() == 'customer.retainer.show' ? ' active' : '' }}">
                                    <a class="dash-link" href="{{ route('customer.retainer') }}">{{ __('Retainers') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                {{-- -------  Customer Proposal ---------- --}}

          


                {{-- -------  Customer Invoice ---------- --}}
                @can('manage customer invoice')
                    <li
                        class="dash-item {{ Request::route()->getName() == 'customer.invoice' || Request::route()->getName() == 'customer.invoice.show' ? ' active' : '' }} ">
                        <a href="{{ route('customer.invoice') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-file-invoice"></i></span>
                            <span class="dash-mtext">{{ __('Invoice') }}</span>
                        </a>
                    </li>
                @endcan


                {{-- -------  Customer Payment ---------- --}}
                @can('manage customer payment')
                    <li class="dash-item {{ Request::route()->getName() == 'customer.payment' ? ' active' : '' }} ">
                        <a href="{{ route('customer.payment') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-report-money"></i></span>
                            <span class="dash-mtext">{{ __('Payment') }}</span>
                        </a>
                    </li>
                @endcan

                {{-- -------  Customer Transaction ---------- --}}
                @can('manage customer transaction')
                    <li class="dash-item {{ Request::route()->getName() == 'customer.transaction' ? ' active' : '' }}">
                        <a href="{{ route('customer.transaction') }}" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-history"></i></span>
                            <span class="dash-mtext">{{ __('Transaction') }}</span>
                        </a>
                    </li>
                @endcan

                {{-- -------  Vendor Bill ---------- --}}
                @can('manage vender bill')
                    <li
                        class="dash-item {{ Request::route()->getName() == 'vender.bill' || Request::route()->getName() == 'vender.bill.show' ? ' active' : '' }}">
                        <a href="{{ route('vender.bill') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-file-invoice"></i></span>
                            <span class="dash-mtext">{{ __('Bill') }}</span>
                        </a>
                    </li>
                @endcan
                {{-- -------  Vendor Payment ---------- --}}
                @can('manage vender payment')
                    <li class="dash-item {{ Request::route()->getName() == 'vender.payment' ? ' active' : '' }} ">
                        <a href="{{ route('vender.payment') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-report-money"></i></span>
                            <span class="dash-mtext">{{ __('Payment') }}</span>
                        </a>
                    </li>
                @endcan

                {{-- -------  Vendor Transaction ---------- --}}
                @can('manage vender transaction')
                    <li class="dash-item {{ Request::route()->getName() == 'vender.transaction' ? ' active' : '' }}">
                        <a href="{{ route('vender.transaction') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-history"></i></span>
                            <span class="dash-mtext">{{ __('Transaction') }}</span>
                        </a>
                    </li>
                @endcan



                {{-- -------  Staff ---------- --}}
                @if (\Auth::user()->type == 'super admin')
                    @can('manage user')
                        <li class="dash-item">
                            <a href="{{ route('users.index') }}"
                                class="dash-link {{ Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit' ? ' active' : '' }}">
                                <span class="dash-micon"><i class="ti ti-users"></i></span>
                                <span class="dash-mtext">{{ __('Companies') }}</span>
                            </a>
                        </li>
                    @endcan
                @else
                    @if (Gate::check('manage user') || Gate::check('manage role'))
                        <li
                            class="dash-item dash-hasmenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? ' active dash-trigger' : '' }}">
                            <a href="#!" class="dash-link "><span class="dash-micon"><i
                                        class="ti ti-users"></i></span><span
                                    class="dash-mtext">{{ __('Staff') }}</span>
                                <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                            <ul
                                class="dash-submenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'show' : '' }}">
                                @can('manage user')
                                    <li
                                        class="dash-item {{ Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit' ? ' active' : '' }}">
                                        <a class="dash-link" href="{{ route('users.index') }}">{{ __('User') }}</a>
                                    </li>
                                @endcan
                                @can('manage role')
                                    <li
                                        class="dash-item {{ Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit' ? ' active' : '' }}">
                                        <a class="dash-link" href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                @endif

                {{-- -------  Product & Service ---------- --}}
                @if (Gate::check('manage product & service'))
                    <li class="dash-item {{ Request::segment(1) == 'productservice' ? 'active' : '' }} ">
                        <a href="{{ route('productservice.index') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-shopping-cart"></i></span>
                            <span class="dash-mtext">{{ __('Product & Services') }}</span>
                        </a>
                    </li>
                @endif

                

                
                <li class="dash-item {{ Request::route()->getName() == 'ledger.list' ? ' active' : '' }} ">
                        <a href="{{ route('ledger.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-notebook"></i></span>
                            <span class="dash-mtext">Ladgers</span>
                        </a>
                    </li>

                    <li class="dash-item {{ Request::route()->getName() == 'kataparchi.list' ? ' active' : '' }} ">
                        <a href="{{ route('kataparchi.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-scissors"></i></span>
                            <span class="dash-mtext">kataparchi</span>
                        </a>
                    </li>

                   
                   


                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'active dash-trigger' : '' }}">
                    <a href="#!" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-currency-rupee"></i></span>
                        <span class="dash-mtext">{{ __('Sales') }}</span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                    </a>

                    <ul class="dash-submenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'show' : '' }}">
                        @can('manage role')
                            <li class="dash-item {{ Request::route()->getName() == 'sellto.list' ? 'active' : '' }}">
                                <a href="{{ route('sellto.list') }}" class="dash-link">
                                    <span class="dash-micon"><i class="ti ti-users"></i></span>
                                    <span class="dash-mtext">Sell To</span>
                                </a>
                            </li>

                            <li class="dash-item {{ Request::route()->getName() == 'Sales-Return.list' ? 'active' : '' }}">
                                <a href="{{ route('Sales-Return.list') }}" class="dash-link">
                                    <span class="dash-micon"><i class="ti ti-rotate-clockwise"></i></span>
                                    <span class="dash-mtext">Sales Return</span>
                                </a>
                            </li>

                            <li class="dash-item {{ Request::route()->getName() == 'SellsQuatation.list' ? 'active' : '' }}">
                                <a href="{{ route('SellsQuatation.list') }}" class="dash-link">
                                    <span class="dash-micon"><i class="ti ti-file-text"></i></span>
                                    <span class="dash-mtext">Selles Quatation</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>


                    <li class="dash-item {{ Request::route()->getName() == 'Rogring.list' ? ' active' : '' }} ">
                        <a href="{{ route('Rogring.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-rotate-clockwise-2"></i></span>
                            <span class="dash-mtext">Rogrings</span>
                        </a>
                    </li>

                    
                     <li class="dash-item {{ Request::route()->getName() == 'bankacc.list' ? ' active' : '' }} ">
                        <a href="{{ route('bankacc.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-credit-card"></i></span>
                            <span class="dash-mtext">Bank Account</span>
                        </a>
                    </li>

                    <li class="dash-item {{ Request::route()->getName() == 'purchase.list' ? ' active' : '' }} ">
                        <a href="{{ route('purchase.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-shopping-cart"></i></span>
                            <span class="dash-mtext">Purchase</span>
                        </a>
                    </li>

                    <li class="dash-item {{ Request::route()->getName() == 'payment.list' ? ' active' : '' }} ">
                        <a href="{{ route('payment.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-report-money"></i></span>
                            <span class="dash-mtext">Payments</span>
                        </a>
                    </li>

                    
                   <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'active dash-trigger' : '' }}">
                    <a href="#!" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-users"></i></span>
                        <span class="dash-mtext">{{ __('Ladger Summary') }}</span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                    </a>

                    <ul class="dash-submenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'show' : '' }}">
                        @can('manage role')
                             <li class="dash-item {{ Request::route()->getName() == 'Ladgerstatement.list' ? ' active' : '' }} ">
                                <a href="{{ route('Ladgerstatement.list') }}" class="dash-link ">
                                    <span class="dash-micon"><i class="ti ti-report-money"></i></span>
                                    <span class="dash-mtext">Statement</span>
                                </a>
                            </li>

                            <li class="dash-item {{ Request::route()->getName() == 'payment_in.list' ? ' active' : '' }} ">
                                <a href="{{ route('payment_in.list') }}" class="dash-link ">
                                    <span class="dash-micon"><i class="ti ti-report-money"></i></span>
                                    <span class="dash-mtext">Payment In</span>
                                </a>
                            </li>
                
                        @endcan
                    </ul>
                </li>

                <li class="dash-item dash-hasmenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'active dash-trigger' : '' }}">
                    <a href="#!" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-users"></i></span>
                        <span class="dash-mtext">{{ __('Processing') }}</span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                    </a>

                    <ul class="dash-submenu {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' ? 'show' : '' }}">
                        @can('manage role')
                             <li class="dash-item {{ Request::route()->getName() == 'staging.list' ? ' active' : '' }} ">
                                    <a href="{{ route('staging.list') }}" class="dash-link ">
                                        <span class="dash-micon"><i class="ti ti-database"></i></span>
                                        <span class="dash-mtext">Staging</span>
                                    </a>
                             </li>

                             <li class="dash-item {{ Request::route()->getName() == 'gredding.list' ? ' active' : '' }} ">
                                <a href="{{ route('gredding.list') }}" class="dash-link ">
                                    <span class="dash-micon"><i class="ti ti-scale"></i></span>
                                    <span class="dash-mtext">Gredding</span>
                                </a>
                             </li>

                             <li class="dash-item {{ Request::route()->getName() == 'packing.list' ? ' active' : '' }} ">
                                    <a href="{{ route('packing.list') }}" class="dash-link ">
                                        <span class="dash-micon"><i class="ti ti-package"></i></span>
                                        <span class="dash-mtext">Packing</span>
                                    </a>
                             </li>

                        @endcan
                    </ul>
                </li>

                {{-- Labor Prices Management --}}
                <li class="dash-item {{ Request::route()->getName() == 'labor-prices.list' ? ' active' : '' }} ">
                    <a href="{{ route('labor-prices.list') }}" class="dash-link ">
                        <span class="dash-micon"><i class="ti ti-currency-rupee"></i></span>
                        <span class="dash-mtext">Labor Prices</span>
                    </a>
                </li>

                   
                    <li class="dash-item {{ Request::route()->getName() == 'company.list' ? ' active' : '' }} ">
                        <a href="{{ route('company.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-building-skyscraper"></i></span>
                            <span class="dash-mtext">Company</span>
                        </a>
                    </li>

                    <li class="dash-item {{ Request::route()->getName() == 'branches.list' ? ' active' : '' }} ">
                        <a href="{{ route('branches.list') }}" class="dash-link ">
                            <span class="dash-micon"><i class="ti ti-building-bank"></i></span>
                            <span class="dash-mtext">Godown</span>
                        </a>
                </li>

    

                {{-- -------  Constant ---------- --}}
                @if (Gate::check('manage constant tax') ||
                        Gate::check('manage constant category') ||
                        Gate::check('manage constant unit') ||
                        Gate::check('manage constant payment method') ||
                        Gate::check('manage constant custom field') ||
                        Gate::check('manage constant contract type') ||
                        Gate::check('manage constant chart of account'))
                    <li
                        class="dash-item dash-hasmenu {{ Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type' ? ' active dash-trigger' : '' }} ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-chart-arcs"></i></span><span
                                class="dash-mtext">{{ __('Constant') }}</span>
                            <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul
                            class="dash-submenu {{ Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type' ? 'show' : '' }}">
                            @can('manage constant tax')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'taxes.index' ? ' active' : '' }}">
                                    <a class="dash-link" href="{{ route('taxes.index') }}">{{ __('Taxes') }}</a>
                                </li>
                            @endcan
                            @can('manage constant category')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'product-category.index' ? 'active' : '' }}">
                                    <a class="dash-link"
                                        href="{{ route('product-category.index') }}">{{ __('Category') }}</a>
                                </li>
                            @endcan
                            @can('manage constant unit')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'product-unit.index' ? ' active' : '' }}">
                                    <a class="dash-link"
                                        href="{{ route('product-unit.index') }}">{{ __('Unit') }}</a>
                                </li>
                            @endcan
                            @can('manage constant custom field')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'custom-field.index' ? 'active' : '' }}">
                                    <a class="dash-link"
                                        href="{{ route('custom-field.index') }}">{{ __('Custom Field') }}</a>
                                </li>
                            @endcan
                            @can('manage constant contract type')
                                <li
                                    class="dash-item {{ Request::route()->getName() == 'contractType.index' ? 'active' : '' }}">
                                    <a class="dash-link"
                                        href="{{ route('contractType.index') }}">{{ __('Contract Type') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

               
            </ul> 
        </div>
    </div>
</nav>
