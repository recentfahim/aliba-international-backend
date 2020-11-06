@extends('admin.layouts.master')

@section('title', 'Orders')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">All Orders</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Mobile Number</th>
                                <th>Location</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th class="text-center">{{ $order->id }}</th>
                                    <th>{{ $order->created_at }}</th>
                                    <th>{{ $order->user_id }}</th>
                                    <th>{{ $order->user_id }}</th>
                                    <th>{{ $order->location_id }}</th>
                                    <th>{{ $order->total_amount }}</th>
                                    <th>{{ $order->status }}</th>
                                    <th>Actions</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
