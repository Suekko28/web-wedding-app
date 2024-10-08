@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/magnific-popup/dist/magnific-popup.css') }}">
@endsection

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Gallery', 'subtitle' => 'Home'])
          <div class="row el-element-overlay">
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img1.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img2.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img3.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img4.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img4.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img3.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img5.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img6.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img6.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block position-relative w-100"
                      alt="user" />
                    <div class="el-overlay w-100 overflow-hidden">
                      <ul class="
                          list-style-none
                          el-info
                          text-white text-uppercase
                          d-inline-block
                          p-0
                        ">
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              image-popup-vertical-fit
                              el-link
                              text-white
                              border-white
                            " href="{{ URL::asset('build/images/blog/blog-img1.jpg') }}"><i class="ti ti-search"></i></a>
                        </li>
                        <li class="el-item d-inline-block my-0 mx-1">
                          <a class="
                              btn
                              default
                              btn-outline
                              el-link
                              text-white
                              border-white
                            " href="javascript:void(0);"><i class="ti ti-link"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-5">
              <h4 class="card-title text-dark">Other Gallery</h4>
              <p class="card-subtitle mb-3">
                you can make gallery like this
              </p>
            </div>
            <div class="col-md-4">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <a class="image-popup-vertical-fit" href="{{ URL::asset('build/images/blog/blog-img5.jpg') }}">
                      <img src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}" class="d-block position-relative w-100"
                        alt="user" />
                    </a>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <a class="image-popup-vertical-fit" href="{{ URL::asset('build/images/blog/blog-img4.jpg') }}">
                      <img src="{{ URL::asset('build/images/blog/blog-img4.jpg') }}" class="d-block position-relative w-100"
                        alt="user" />
                    </a>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <a class="image-popup-vertical-fit" href="{{ URL::asset('build/images/blog/blog-img7.jpg') }}">
                      <img src="{{ URL::asset('build/images/blog/blog-img7.jpg') }}" class="d-block position-relative w-100"
                        alt="user" />
                    </a>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <a class="image-popup-vertical-fit" href="{{ URL::asset('build/images/blog/blog-img2.jpg') }}">
                      <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block position-relative w-100"
                        alt="user" />
                    </a>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <a class="image-popup-vertical-fit" href="{{ URL::asset('build/images/blog/blog-img6.jpg') }}">
                      <img src="{{ URL::asset('build/images/blog/blog-img6.jpg') }}" class="d-block position-relative w-100"
                        alt="user" />
                    </a>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
              <div class="card overflow-hidden">
                <div class="el-card-item pb-3">
                  <div class="
                      el-card-avatar
                      mb-3
                      el-overlay-1
                      w-100
                      overflow-hidden
                      position-relative
                      text-center
                    ">
                    <a class="image-popup-vertical-fit" href="{{ URL::asset('build/images/profile/user-2.jpg') }}">
                      <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block position-relative w-100"
                        alt="user" />
                    </a>
                  </div>
                  <div class="el-card-content text-center">
                    <h4 class="mb-0 card-title">Project title</h4>
                    <p class="card-subtitle">subtitle of project</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/plugins/meg.init.js') }}"></script>
@endsection
