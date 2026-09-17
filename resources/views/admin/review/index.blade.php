@extends('admin.admin_master')

@section('admin')

    <div class="content">
        <!-- Start Content -->
        <div class="container-xxl">

        <!-- Page Title -->
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Data Tables</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Tables</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Data Tables
                        </li>
                    </ol>
                </div>
            </div>

            <!-- DataTables -->
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <!-- Card Header -->
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                Basic Datatable
                            </h5>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">

                            <div class="table-responsive">
                                <table
                                    id="datatable"
                                    class="table table-bordered dt-responsive nowrap"
                                    style="width: 100%;"
                                >

                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($reviews as $key => $review)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $review->name }}</td>
                                                <td>{{ $review->position }}</td>
                                                <td>
                                                    <img src="{{ asset($review->photo) }}" alt="Review Image" width="50">
                                                </td>
                                                <td>{{ $review->message }}</td>
                                                <td>
                                                    <!-- Action buttons (Edit/Delete) can be added here -->
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

    </div>

@endsection
