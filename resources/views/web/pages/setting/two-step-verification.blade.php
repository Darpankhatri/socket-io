@extends('web.layouts.master')

@section('content')
    
    <!-- 2-step -->
    <main class="main is-visible" style="background-color: #1a1d21;">
        <div class="container h-100">

            <div class="d-flex flex-column justify-content-center text-center">
                <!-- 2-step Header -->
                <div class="chat-header border-bottom py-4 py-lg-7">
                    <div class="row align-items-center">

                        <!-- Mobile: close -->
                        <div class="col-2 d-xl-none">
                            <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            </a>
                        </div>
                        <!-- Mobile: close -->

                        <!-- Content -->
                        <div class="col-8 col-xl-12">
                            <div class="row align-items-center text-center text-xl-start">
                                <!-- Title -->
                                <div class="col-12 col-xl-6">
                                    <div class="row align-items-center gx-5">

                                        <div class="col overflow-hidden">
                                            <h5 class="text-truncate">2-Step Verification</h5>
                                            <p class="text-truncate">To help keep your account safe.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Title -->

                                <!-- Toolbar -->
                                <div class="col-xl-6 d-none d-xl-block">
                                    <div class="row align-items-center justify-content-end gx-6">
                                        <div class="col-auto">
                                            <a href="#" class="icon icon-lg text-muted" data-offcanvas="info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Toolbar -->
                            </div>
                        </div>
                        <!-- Content -->

                        <!-- Mobile: more -->
                        <div class="col-2 d-xl-none text-end">
                            <a href="#" class="icon icon-lg text-muted" data-offcanvas="info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </a>
                        </div>
                        <!-- Mobile: more -->

                    </div>
                </div>
                <!-- 2-step Header -->

                
                <div class="mt-6">
                    
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center gx-5">
                                <div class="col">
                                    <h5 style="float: left">2-Step Verification is ON since Jul 6, 2022</h5>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">TURN OFF</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4 px-6">
                        <small class="text-muted me-auto">Available second steps    </small>
                    </div>
    
                    <div class="card border-0">
                        <div class="card-body py-2">
                            <!-- Accordion -->
                            <div class="accordion accordion-flush" id="accordion-profile">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="accordion-profile-1">
                                        <a class="accordion-button text-reset collapsed cursor-pointer"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#accordion-profile-body-1" aria-expanded="false"
                                            aria-controls="accordion-profile-body-1">
                                            <div>
                                                <h5>Profile settings</h5>
                                                <p>Change your profile settings</p>
                                            </div>
                                        </a>
                                    </div>
    
                                    <div id="accordion-profile-body-1" class="accordion-collapse collapse"
                                        aria-labelledby="accordion-profile-1"
                                        data-parent="#accordion-profile">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-6">
                                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                                                    id="profile-name" placeholder="Name">
                                                <label for="profile-name">Name</label>
                                            </div>
    
                                            <div class="form-floating mb-6">
                                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}"
                                                    id="profile-phone" placeholder="Phone">
                                                <label for="profile-phone">Phone</label>
                                            </div>
    
                                            <div class="form-floating mb-6">
                                                <textarea class="form-control" placeholder="Bio" id="profile-bio" data-autosize="true"
                                                    style="min-height: 120px;">{{ Auth::user()->bio }}</textarea>
                                                <label for="profile-bio">Bio</label>
                                            </div>
    
                                            <button type="button"
                                                class="btn btn-block btn-lg btn-primary w-100 profile-save">Save</button>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="accordion-item">
                                    <div class="accordion-header" id="accordion-profile-2">
                                        <a class="accordion-button text-reset collapsed cursor-pointer"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#accordion-profile-body-2" aria-expanded="false"
                                            aria-controls="accordion-profile-body-2">
                                            <div>
                                                <h5>Social accounts</h5>
                                                <p>Add your social accounts</p>
                                            </div>
                                        </a>
                                    </div>
    
                                    <div id="accordion-profile-body-2" class="accordion-collapse collapse"
                                        aria-labelledby="accordion-profile-2"
                                        data-parent="#accordion-profile">
                                        <div class="accordion-body">
                                            <div class="form-floating mb-6">
                                                <input type="text" class="form-control"
                                                    id="profile-twitter" placeholder="Twitter">
                                                <label for="profile-twitter">Twitter</label>
                                            </div>
    
                                            <div class="form-floating mb-6">
                                                <input type="text" class="form-control"
                                                    id="profile-facebook" placeholder="Facebook">
                                                <label for="profile-facebook">Facebook</label>
                                            </div>
    
                                            <div class="form-floating mb-6">
                                                <input type="text" class="form-control"
                                                    id="profile-instagram" placeholder="Instagram">
                                                <label for="profile-instagram">Instagram</label>
                                            </div>
    
                                            <button type="button"
                                                class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Switch -->
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5>Appearance</h5>
                                                <p>Choose light or dark theme</p>
                                            </div>
                                            <div class="col-auto">
                                                <a class="switcher-btn text-reset" href="#!"
                                                    title="Themes">
                                                    <div class="switcher-icon switcher-icon-dark icon icon-lg d-none"
                                                        data-theme-mode="dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-moon">
                                                            <path
                                                                d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div class="switcher-icon switcher-icon-light icon icon-lg d-none"
                                                        data-theme-mode="light">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-sun">
                                                            <circle cx="12" cy="12"
                                                                r="5"></circle>
                                                            <line x1="12" y1="1"
                                                                x2="12" y2="3">
                                                            </line>
                                                            <line x1="12" y1="21"
                                                                x2="12" y2="23">
                                                            </line>
                                                            <line x1="4.22" y1="4.22"
                                                                x2="5.64" y2="5.64">
                                                            </line>
                                                            <line x1="18.36" y1="18.36"
                                                                x2="19.78" y2="19.78">
                                                            </line>
                                                            <line x1="1" y1="12"
                                                                x2="3" y2="12">
                                                            </line>
                                                            <line x1="21" y1="12"
                                                                x2="23" y2="12">
                                                            </line>
                                                            <line x1="4.22" y1="19.78"
                                                                x2="5.64" y2="18.36">
                                                            </line>
                                                            <line x1="18.36" y1="5.64"
                                                                x2="19.78" y2="4.22">
                                                            </line>
                                                        </svg>
                                                    </div>
                                                </a>
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
    </main>
    <!-- 2-step -->

@endsection
