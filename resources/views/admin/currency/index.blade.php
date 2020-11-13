@extends('admin.layouts.master')

@section('title', 'Payment History')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Currency Conversion</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Received Currency</th>
                                <th>BDT</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-weight-bold">{{ $currency->received_currency }}</td>
                                <td>{{ $currency->bdt }}</td>
                                <td>
                                    <a href="{{ route('currency.edit', $currency->id) }}">
                                        <span class="text-info">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
