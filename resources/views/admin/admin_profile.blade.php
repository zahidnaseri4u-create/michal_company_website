@extends('admin.admin_master')

@section('admin')

<div class="content">
    <!-- Start Content -->
    <div class="container-xxl">

```
    <!-- Page Title -->
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Admin Profile</h4>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">

                    <!-- Profile Header -->
                    <div class="d-flex align-items-center">

                        <img
                            src="{{ !empty($userprofile->photo)
                                ? url('backend/assets/images/users/' . $userprofile->photo)
                                : url('backend/assets/images/users/user-11.jpg') }}"
                            class="rounded-circle avatar-xxl img-thumbnail float-start"
                            alt="Profile picture"
                            style="width: 120px; height: 120px; object-fit: cover;"
                        >

                        <div class="overflow-hidden ms-4">
                            <h4 class="m-0 text-dark fs-20">
                                {{ $userprofile->name }}
                            </h4>

                            <p class="my-1 text-muted fs-16">
                                {{ $userprofile->email }}
                            </p>
                        </div>

                    </div>

                    <hr>

                    <!-- Settings -->
                    <div class="tab-content text-muted bg-white">

                        <div
                            class="tab-pane active show pt-4"
                            id="profile_setting"
                            role="tabpanel"
                        >

                            <div class="row">

                                <!-- ========================= -->
                                <!-- Personal Information -->
                                <!-- ========================= -->

                                <div class="col-lg-6 col-xl-6 mb-4">

                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title mb-0">
                                                        Personal Information
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <form
                                            action="{{ route('profile.store') }}"
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
                                                        value="{{ old('name', $userprofile->name) }}"
                                                        required
                                                    >

                                                </div>

                                                <!-- Email -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        Email
                                                    </label>

                                                    <div class="input-group">

                                                        <span class="input-group-text">
                                                            <i class="mdi mdi-email"></i>
                                                        </span>

                                                        <input
                                                            type="email"
                                                            name="email"
                                                            class="form-control"
                                                            value="{{ old('email', $userprofile->email) }}"
                                                            required
                                                        >

                                                    </div>

                                                </div>

                                                <!-- Phone -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        Phone
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="phone"
                                                        class="form-control"
                                                        value="{{ old('phone', $userprofile->phone) }}"
                                                    >

                                                </div>

                                                <!-- Address -->
                                                <div class="form-group mb-3">

                                                    <label class="form-label">
                                                        Address
                                                    </label>

                                                    <textarea
                                                        class="form-control"
                                                        rows="5"
                                                        name="address"
                                                        spellcheck="false"
                                                    >{{ old('address', $userprofile->address) }}</textarea>

                                                </div>

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


                                <!-- ========================= -->
                                <!-- Change Password -->
                                <!-- ========================= -->

                                <div class="col-lg-6 col-xl-6 mb-4">

                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <div class="row align-items-center">

                                                <div class="col">
                                                    <h4 class="card-title mb-0">
                                                        Change Password
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>

<form
    action="{{ route('profile.password') }}"
    method="POST"
>
    @csrf

    <div class="card-body">

        <!-- Old Password -->
        <div class="form-group mb-3">

            <label class="form-label">
                Old Password
            </label>

            <input
                class="form-control"
                type="password"
                name="old_password"
                placeholder="Enter old password"
                required
            >

        </div>

        <!-- New Password -->
        <div class="form-group mb-3">

            <label class="form-label">
                New Password
            </label>

            <input
                class="form-control"
                type="password"
                name="new_password"
                placeholder="Enter new password"
                required
            >

        </div>

        <!-- Confirm Password -->
        <div class="form-group mb-3">

            <label class="form-label">
                Confirm Password
            </label>

            <input
                class="form-control"
                type="password"
                name="confirm_password"
                placeholder="Confirm new password"
                required
            >

        </div>

        <!-- Buttons -->
        <div class="form-group">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Change Password
            </button>

            <button
                type="reset"
                class="btn btn-danger"
            >
                Cancel
            </button>

        </div>

    </div>

</form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
```

</div>

<!-- ========================= -->

<!-- Image Preview JavaScript -->

<!-- ========================= -->

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
