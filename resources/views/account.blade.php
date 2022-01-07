@extends('seller::layouts.panel')

@section('title',__('seller::account.title'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('seller.dashboard') }}">{{ __('seller::dashboard.title') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('seller::account.title') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('seller::account.title') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ Auth::user()->avatar_url }}" class="rounded-circle avatar-lg img-thumbnail"
                         alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ Auth::user()->name }}</h4>
                    <p class="text-muted font-14">Founder</p>

                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type.
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva
                                                    D. McKnight</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span>
                        </p>

                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form>
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                            Info</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="full_name"
                                           placeholder="Enter full name">
                                </div>
                            </div>
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="userbio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="userbio" rows="4"
                                              placeholder="Write something..."></textarea>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="useremail"
                                           placeholder="Enter email">
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <p class="text-muted">If you want to change password please <a
                                href="javascript: void(0);">click</a> here.</p>

                        <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                class="mdi mdi-office-building me-1"></i> Company Info</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="companyname" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyname"
                                           placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cwebsite" class="form-label">Website</label>
                                    <input type="text" class="form-control" id="cwebsite"
                                           placeholder="Enter website url">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2"><i
                                    class="mdi mdi-content-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
