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
            </div>

            <div class="row">

                                <!-- ========================= -->
                                <!-- Personal Information -->
                                <!-- ========================= -->

                                <div class="col-lg-6 col-xl-12 mb-4">

                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title mb-0">
                                                        Add review
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <form
                                            action="{{ route('review.store') }}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                        >
                                            @csrf

                                            <div class="card-body">

                                                <!-- Name -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        Name
                                                    </label>

                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        name="name"
                                                        required
                                                    >

                                                </div>

                                                <!-- Email -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        Position
                                                    </label>

                                                    <div class="input-group">

                                                        <input
                                                            type="text"
                                                            name="position"
                                                            class="form-control"
                                                        >

                                                    </div>

                                                </div>

                                                <!-- Phone -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        message
                                                    </label>

                                                   <textarea class="form-control" id="example-textarea" name="message" rows="5" spellcheck="false"></textarea>

                                                </div>

                                                <!-- Address -->

                                                <!-- Profile Picture -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        Profile Picture
                                                    </label>

                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        name="photo"
                                                        id="photo"
                                                        accept="image/jpeg,image/png,image/jpg,image/webp"
                                                    >

                                                    <!-- Image Preview -->
                                                    <div class="mt-3">

                                                        <img
                                                            id="imagePreview"
                                                            src="{{ !empty($userprofile->photo)
                                                                ? url('backend/assets/images/users/' . $userprofile->photo)
                                                                : url('backend/assets/images/users/user-11.jpg') }}"
                                                            class="rounded-circle avatar-xxl img-thumbnail"
                                                            alt="Profile picture preview"
                                                            style="width: 120px; height: 120px; object-fit: cover;"
                                                        >

                                                    </div>

                                                </div>

                                                <!-- Save -->
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    Save Changes
                                                </button>

                                            </div>
                                        </form>

                                    </div>

                                </div>
            </div>



        </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const photoInput = document.getElementById('photo');
        const imagePreview = document.getElementById('imagePreview');

        if (photoInput && imagePreview) {

            photoInput.addEventListener('change', function (event) {

                const file = event.target.files[0];

                if (file) {

                    const reader = new FileReader();

                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }

            });

        }

    });
</script>


@endsection

