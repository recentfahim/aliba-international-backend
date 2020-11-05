@extends('admin.layouts.master')

@section('title', 'Location Create')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header container-fluid">
                        <div class="row w-100">
                            <div class="col-md-10">Create Location</div>
                            <div class=" col-md-2 float-right">
                                <a href="{{ route('admin.location') }}">
                                    <button class="btn btn-primary btn-sm">List</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.location_store') }}">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="location_name">
                                    Name
                                </label>
                                <input name="location_name" id="location_name" placeholder="Name of the Location" type="text" class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="parent_id">
                                    Parent Location
                                </label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0" selected disabled>---- Parent Location ----</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_active">
                                        Is Active
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
