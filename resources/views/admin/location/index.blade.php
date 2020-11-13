@extends('admin.layouts.master')

@section('title', 'Locations')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header container-fluid">
                        <div class="row w-100">
                            <div class="col-md-11">All Locations</div>
                            <div class=" col-md-1 float-right">
                                <a href="/admin/location/create">
                                    <span><i class="fas fa-plus"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th class="text-center">Parent</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td class="text-center text-muted">{{ $location->id }}</td>
                                        <td class="widget-heading">{{ $location->name }}</td>
                                        <td class="text-center text-muted">
                                            @if($location->parent)
                                                {{  $location->parent->name  }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        @if($location->is_active)
                                            <td class="text-center">
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <div class="badge badge-danger">Inactive</div>
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            <span class="mr-2 text-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                            <a href="{{ route('location.edit', $location->id) }}">
                                                <span class="text-info">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
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
</div>
@endsection
