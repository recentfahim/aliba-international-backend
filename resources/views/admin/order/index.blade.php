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
                                <th>Order Status</th>
                                <th>Location</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="text-center">{{ $order->id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->location->name }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>Actions</td>
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
