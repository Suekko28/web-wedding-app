@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Badges', 'subtitle' => 'Home'])
          <div class="row">
            <!-- ---------------------------------------------- -->
            <!-- 1. Badges -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-4 card-title">Badges</h4>
                  <h1>
                    Example heading
                    <span class="badge text-bg-secondary">New</span>
                  </h1>
                  <h2>
                    Example heading
                    <span class="badge text-bg-secondary">New</span>
                  </h2>
                  <h3>
                    Example heading
                    <span class="badge text-bg-secondary">New</span>
                  </h3>
                  <h4>
                    Example heading
                    <span class="badge text-bg-secondary">New</span>
                  </h4>
                  <h5>
                    Example heading
                    <span class="badge text-bg-secondary">New</span>
                  </h5>
                  <h6>
                    Example heading
                    <span class="badge text-bg-secondary">New</span>
                  </h6>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------- -->
            <!-- 2. Badges with button -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-4 card-title">Badges with button</h4>
                  <h6>Right Align Badge</h6>
                  <div class="row gap-2">
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-primary-subtle w-100 d-block text-primary ">
                        Primary
                        <span class="badge ms-auto text-bg-primary">1</span>
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-info-subtle w-100 d-block text-info ">
                        Info <span class="badge ms-auto text-bg-info">2</span>
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-warning-subtle w-100 d-block text-warning ">
                        Warning
                        <span class="badge ms-auto text-bg-warning">3</span>
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-danger-subtle w-100 d-block text-danger ">
                        Danger <span class="badge ms-auto text-bg-danger">4</span>
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-success-subtle w-100 d-block text-success ">
                        Success
                        <span class="badge ms-auto text-bg-success">5</span>
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-secondary-subtle w-100 d-block text-secondary ">
                        Secondary
                        <span class="badge ms-auto text-bg-secondary">6</span>
                      </button>
                    </div>
                  </div>
                  <h6 class="mt-3">Left Align Badge</h6>
                  <div class="row gap-2 mt-2">
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-primary-subtle w-100 d-block text-primary ">
                        <span class="badge me-auto text-bg-primary">1</span>Primary
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-info-subtle w-100 d-block text-info ">
                        <span class="badge me-auto text-bg-info">2</span> Info
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-warning-subtle w-100 d-block text-warning ">
                        <span class="badge me-auto text-bg-warning">3</span>
                        Warning
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-danger-subtle w-100 d-block text-danger ">
                        <span class="badge me-auto text-bg-danger">4</span> Danger
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-success-subtle w-100 d-block text-success ">
                        <span class="badge me-auto text-bg-success">5</span>
                        Success
                      </button>
                    </div>
                    <div class="col-md-5">
                      <button type="button" class="btn d-flex bg-secondary-subtle w-100 d-block text-secondary ">
                        <span class="badge me-auto text-bg-secondary">6</span>
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------- -->
            <!-- 3. Badges -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-4 card-title">Badges with Background</h4>
                  <h6>With Solid Background</h6>
                  <span class="mb-1 badge text-bg-primary">Primary</span>
                  <span class="mb-1 badge text-bg-secondary">Secondary</span>
                  <span class="mb-1 badge text-bg-success">Success</span>
                  <span class="mb-1 badge text-bg-danger">Danger</span>
                  <span class="mb-1 badge text-bg-warning">Warning</span>
                  <span class="mb-1 badge text-bg-info">Info</span>
                  <span class="mb-1 badge text-bg-light">Light</span>
                  <span class="mb-1 badge text-bg-dark">Dark</span>

                  <h6 class="mt-3 pt-3 mt-4">With Light Background</h6>
                  <span class="mb-1 badge  bg-primary-subtle text-primary">Primary</span>
                  <span class="mb-1 badge  bg-secondary-subtle text-secondary">Secondary</span>
                  <span class="mb-1 badge  bg-success-subtle text-success">Success</span>
                  <span class="mb-1 badge  bg-danger-subtle text-danger">Danger</span>
                  <span class="mb-1 badge  bg-warning-subtle text-warning">Warning</span>
                  <span class="mb-1 badge  bg-info-subtle text-info">Info</span>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------- -->
            <!-- 3. Badges Pill -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-4">Badges Pill with Background</h4>
                  <h6>With Solid Background</h6>
                  <span class="mb-1 badge rounded-pill text-bg-primary">Primary</span>
                  <span class="mb-1 badge rounded-pill text-bg-secondary">Secondary</span>
                  <span class="mb-1 badge rounded-pill text-bg-success">Success</span>
                  <span class="mb-1 badge rounded-pill text-bg-danger">Danger</span>
                  <span class="mb-1 badge rounded-pill text-bg-warning">Warning</span>
                  <span class="mb-1 badge rounded-pill text-bg-info">Info</span>
                  <span class="mb-1 badge rounded-pill text-bg-light">Light</span>
                  <span class="mb-1 badge rounded-pill text-bg-dark">Dark</span>

                  <h6 class="mt-3 pt-3 mt-4">With Light Background</h6>
                  <span class="mb-1 badge rounded-pill  bg-primary-subtle text-primary">Primary</span>
                  <span class="mb-1 badge rounded-pill  bg-secondary-subtle text-secondary">Secondary</span>
                  <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">Success</span>
                  <span class="mb-1 badge rounded-pill  bg-danger-subtle text-danger">Danger</span>
                  <span class="mb-1 badge rounded-pill  bg-warning-subtle text-warning">Warning</span>
                  <span class="mb-1 badge rounded-pill  bg-info-subtle text-info">Info</span>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
@endsection