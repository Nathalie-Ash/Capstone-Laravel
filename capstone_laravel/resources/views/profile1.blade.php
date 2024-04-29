<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>




    <div>
        <span style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            My Profile</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">
            <div class="row">

                <div class="col-6">
                    <div id="division1" style="height: 100%;">
                        <p id="step-title" style="padding-top: 0px;">Account</p>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="{{ $userData->username }}" style="width: 70%;">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label"
                                style="text-align: left; padding-left: 4.5%;">Email</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $userData->email }}" style="width: 70%;">
                            </div>
                        </div>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">

                                <label for="staticPass" class="col-sm-3 col-form-label"
                                    style="text-align: left; padding-left: 4.5%;" name="password">Password</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" readonly class="form-control" id="staticPassword"
                                            value="{{ substr($userData->password, 0, 13) }}"
                                            style="width: min-content; background-color: #579792; border-radius: 5%; color: white;font-weight: larger;">

                                        <div class="input-group-append">
                                            <a  href="{{ route('password.request') }}" class="btn"
                                                style="background-color: #FF6F28;  margin-left: 5px; color: white;border: none"
                                                > Reset<a>
                                                    
                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="color:#ff6f28;"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> --}}
                                {{-- @endif --}}
                                                    {{-- <button type="submit" class="btn btn-primary"
                                                style="margin-left: 5px; background-color: #FF6F28; border: none" data-bs-target="#resetPasswordModal">Reset</button> --}}
                                        </div>
                                    </div>
                                </div>
                        </form>


                        <section class="container">
                            <form class="row" style="padding-top: 20px;">
                                <label class="col-sm-3 col-form-label"
                                    style="text-align: left; padding-left: 4.5%;">Birthday</label>
                                <div class="col-5">
                                    <div class="input-group">
                                        <input type="text" id="birthdate" value="{{ $userData->birthdate }}"
                                            name="birthdate" class="form-control" style="color: white;" readonly>
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar" style="color: #579792;"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <div class="row justify-content-between">
                            <div class="col-4">

                                <a href="{{ route('logout') }}"
                                    class="list-group-item list-group-item-action py-2 ripple"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span style="color:#FF6F28; font-weight: normal">Sign
                                        Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            <!-- Delete Account Button -->
                            <div class="col-4">

                                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    <span style="color:#FF6F28; font-weight: normal">Delete Account</span>
                                </a>


                            </div>


                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete your account?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('softDeleteUser', ['id' => $userData->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    style="background-color:#FF6F28 ">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div
                            style="display: flex;
                                    align-items: center;
                                    justify-content: center;">
                            <button type="submit" onclick="goToNextPage()" class="btn btn-primary "
                                style="width: 60%;text-align: center;background-color: #FF6F28; border: none;text-align: center;">Edit
                                Personal Information </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <p id="step-title" style="padding-top: 0px;">Click on image to change your profile picture</p>
                <div id="imageContainer" style="display: inline-block;">
                    @if ($userImage)
                        <img style="height: 100%; width: 100%;" src="{{ asset($userImage->avatar) }}">
                    @else
                        <img style="height: 100%; width: 100%;" src="{{ asset('images/placeholder.png') }}"
                            alt="Placeholder Image">
                    @endif
                </div>
            </div>

        </div>

        </div>


        </div>


        {{-- <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            Are you sure you want to reset your password?
                            <div style="padding-top: 4%;">
                                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                                {{-- <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                </form> --}}


    
            </section>


    </div> 

    <script>
        function goToNextPage() {

            window.location.href = "profile2";
        }
    </script>

</x-menuLayout>
