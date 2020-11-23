@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Analytics Dashboard
                            <div class="page-title-subheading">Here you can get a summary of the admin panel.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Orders</div>
                                <div class="widget-subheading">Total Orders Today</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{ $total_order }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Delivered</div>
                                <div class="widget-subheading">Total Delivered Today</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{ $delivered_order }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Pending</div>
                                <div class="widget-subheading">Total Pending Today</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{ $pending_order }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-premium-dark">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Products Sold</div>
                                <div class="widget-subheading">Revenue streams Today</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-warning"><span>35000</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Users Onboard</div>
                                    <div class="widget-subheading">Total Users</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success"> {{ $users }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Products Sold Value</div>
                                    <div class="widget-subheading">Revenue streams Today</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">35000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Currency Rate</div>
                                    <div class="widget-subheading">Currency rate set by admin</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">{{ $currency->bdt }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Latest Orders</div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">City</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($latest_order as $order)
                                        <tr>
                                            <td class="text-center text-muted">{{ $order->id }}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                @if($order->user->profile_image)
                                                                    <img width="40" class="rounded-circle" src="{{ $order->user->profile_image }}" alt="{{ $order->user->name }}">
                                                                @else
                                                                    <img width="40" class="rounded-circle" src="{{ asset('images/avatars/default-user.png') }}" alt="{{ $order->user->name }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $order->user->name }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $order->user->mobile_number }}</td>
                                            <td class="text-center">{{ $order->location->name }}</td>
                                            <td class="text-center">
                                                @if($order->status == 'Pending')
                                                    <div class="mb-2 mr-2 badge badge-pill badge-secondary">{{ $order->status }}</div>
                                                @elseif($order->status == 'Processing')
                                                    <div class="mb-2 mr-2 badge badge-pill badge-warning">{{ $order->status }}</div>
                                                @elseif($order->status == 'Shipped')
                                                    <div class="mb-2 mr-2 badge badge-pill badge-info">{{ $order->status }}</div>
                                                @elseif($order->status == 'Delivered')
                                                    <div class="mb-2 mr-2 badge badge-pill badge-success">{{ $order->status }}</div>
                                                @else
                                                    <div class="mb-2 mr-2 badge badge-pill badge-alternate">{{ $order->status }}</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="#">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <a href="{{ route('admin.order') }}">View all Orders</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Latest Users</div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latest_user as $user)
                                        <tr>
                                            <td class="text-center text-muted">{{ $user->id }}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                @if($user->profile_image)
                                                                    <img width="40" class="rounded-circle" src="{{ $user->profile_image }}" alt="{{ $user->name }}">
                                                                @else
                                                                    <img width="40" class="rounded-circle" src="{{ asset('images/avatars/default-user.png') }}" alt="{{ $user->name }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">John Doe</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $user->mobile }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">
                                                <a href="#">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <a href="{{ route('admin.user') }}">View all Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner">
                    <div class="app-footer-left">
                        Made with ❤ by<a href="http://edsoftbd.org/"> E Data Soft Ltd.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
