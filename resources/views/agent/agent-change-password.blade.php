@extends('agent.agent-dashboard')
@section('agent')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div class="mb-3">
                                <img class="wd-100 rounded-circle"
                                    src="{{ !empty($profileData->photo) ? url('upload/agent-images/' . $profileData->photo) : url('upload/no-image.jpg') }}"
                                    alt="profile">
                                <span class="h4 ms-3 text-primary">{{ $profileData->name }}</span>
                            </div>

                        </div>
                        <p>Hi! <span class="text-primary">{{ $profileData->name }}</span> the Senior UI Designer at NobleUI.
                            We hope you enjoy the design and quality of
                            Social.</p>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                            <p class="text-muted">{{ $profileData->username }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email Address:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title text-primary">Agent Change Password</h6>

                                <form class="forms-sample" method="POST" action="{{ route('agent.update.password') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputOldPassword1" class="form-label">Old Password</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                            id="old_password" autocomplete="off">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputNewPassword1" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                            id="new-password" autocomplete="off">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputNewPassword1" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            id="new_password_confirmation" autocomplete="off">
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                                </form>

                            </div>
                        </div>

                        {{-- <div class="alert alert-fill-primary mt-2" role="alert">
                            <p class="text-center">A simple primary alert—check it out!</p>
                        </div> --}}

                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>


    <script type="text/javascript">
    // password
        // const passwordInput = document.getElementById("passwordInput");
        // const togglePassword = document.getElementById("togglePassword");

        // togglePassword.addEventListener("click", function() {
        //     const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        //     passwordInput.setAttribute("type", type);

        //     // Toggle eye icon
        //     if (passwordField.type === "password") {
        //         passwordField.type = "text";
        //         togglePassword.classList.add("eye-off");
        //         togglePassword.classList.remove("eye");
        //     } else {
        //         passwordField.type = "password";
        //         togglePassword.classList.add("eye");
        //         togglePassword.classList.remove("eye-off");
        //     }
        // });
    </script>
@endsection
