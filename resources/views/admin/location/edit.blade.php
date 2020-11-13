@extends('admin.layouts.master')

@section('title', 'Location Edit')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header container-fluid">
                        <div class="row w-100">
                            <div class="col-md-11">Edit Location</div>
                            <div class=" col-md-1 float-right">
                                <a href="{{ route('location.index') }}">
                                    <span><i class="fas fa-list"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('location.update', $single_location->id ) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="position-relative form-group">
                                <label for="location_name">
                                    Name
                                </label>
                                <input name="location_name" id="location_name" placeholder="Name of the Location" type="text" class="form-control" value="{{ $single_location->name }}">
                            </div>
                            <div class="position-relative form-group">
                                <label for="parent_id">
                                    Parent Location
                                </label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    @if($single_location->parent)
                                        <option value="{{ $single_location->parent->id }}" selected disabled>{{ $single_location->parent->name }}</option>
                                    @else
                                        <option value="0" selected disabled>---- Parent Location ----</option>
                                    @endif
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        @if($single_location->is_active)
                                            <input type="checkbox" class="form-check-input" name="is_active" checked>
                                        @else
                                            <input type="checkbox" class="form-check-input" name="is_active">
                                        @endif
                                            Is Active
                                    </label>
                                </div>
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
