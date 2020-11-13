@extends('admin.layouts.master')

@section('title', 'Edit Currency')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header container-fluid">
                        <div class="row w-100">
                            <div class="col-md-11">Edit Currency</div>
                            <div class=" col-md-1 float-right">
                                <a href="{{ route('currency.index') }}">
                                    <span><i class="fas fa-list"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('currency.update', $currency->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="position-relative form-group">
                                <label for="currency_name">
                                    Currency Name
                                </label>
                                <input name="currency_name" id="currency_name" placeholder="Name of the Currency" type="text" class="form-control" value="{{ $currency->received_currency }}">
                            </div>
                            <div class="position-relative form-group">
                                <label for="currency_bdt">
                                    BDT Amount
                                </label>
                                <input name="currency_bdt" id="currency_bdt" placeholder="BDT Amount" type="text" class="form-control" value="{{ $currency->bdt }}">
                            </div>
                            <button type="submit" class="mt-1 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
