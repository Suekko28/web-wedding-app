@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'List', 'subtitle' => 'Home'])
          <div class="row">
            <!-- -------------------------------------------- -->
            <!-- 1. Basic List -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Basic List</h4>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 3
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 4
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 5
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 2. Active list item -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Active List item</h4>
                  <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">
                      <i class="ti ti-box fs-4 me-2"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 3
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 4
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 5
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 3. Disabled list item -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Disabled List item</h4>
                  <ul class="list-group">
                    <li class="list-group-item disabled" aria-disabled="true">
                      <i class="ti ti-box fs-4 me-2"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2"></i>
                      Todo List 3
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2"></i>
                      Todo List 4
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-box fs-4 me-2"></i>
                      Todo List 5
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 4. List with links -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">List with links</h4>
                  <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action active" aria-current="true">
                      <i class="ti ti-inbox fs-4 me-2"></i>
                      Inbox
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                      <i class="ti ti-star fs-4 me-2"></i>
                      Starred
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                      <i class="ti ti-send fs-4 me-2"></i>
                      Draft
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                      <i class="ti ti-trash fs-4 me-2"></i>
                      Trash
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action disabled" tabindex="-1"
                      aria-disabled="true">
                      <i class="ti ti-circle-half fs-4 me-2"></i>
                      Spam
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 5. List with buttons -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">List with buttons</h4>
                  <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                      <i class="ti ti-inbox fs-4 me-2"></i>
                      Inbox
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">
                      <i class="ti ti-star fs-4 me-2"></i>
                      Starred
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">
                      <i class="ti ti-send fs-4 me-2"></i>
                      Draft
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">
                      <i class="ti ti-trash fs-4 me-2"></i>
                      Trash
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>
                      <i class="ti ti-circle-half fs-4 me-2"></i>
                      Spam
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 6. List with Flush -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">List with Flush</h4>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <i class="ti ti-inbox fs-4 me-2"></i>
                      Inbox
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-star fs-4 me-2"></i>
                      Starred
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-send fs-4 me-2"></i>
                      Draft
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-trash fs-4 me-2"></i>
                      Trash
                    </li>
                    <li class="list-group-item">
                      <i class="ti ti-circle-half fs-4 me-2"></i>
                      Spam
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 7. Horizontal list -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Horizontal list</h4>
                  <ul class="list-group list-group-horizontal">
                    <li class="list-group-item d-md-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 mb-2 mb-md-0 flex-shrink-0 text-primary"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item d-md-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 mb-2 mb-md-0 flex-shrink-0 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item d-md-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 mb-2 mb-md-0 flex-shrink-0 text-primary"></i>
                      Todo List 3
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 8. Horizontal list Up Sm -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Horizontal list Up sm</h4>
                  <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 3
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 9. Horizontal list Up md -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Horizontal list Up md</h4>
                  <ul class="list-group list-group-horizontal-md">
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 3
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 10. Horizontal list Up lg -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Horizontal list Up lg</h4>
                  <ul class="list-group list-group-horizontal-lg">
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 3
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 11. Horizontal list Up xl -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Horizontal list Up xl</h4>
                  <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 1
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 2
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-brand-chrome fs-4 me-2 text-primary"></i>
                      Todo List 3
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 12. List with badges -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">List with badges</h4>
                  <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 1
                      <span class="badge bg-light-primary text-primary  ms-auto">14</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 2
                      <span class="badge bg-light-danger text-danger  ms-auto">10</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <i class="ti ti-box fs-4 me-2 text-primary"></i>
                      Todo List 3
                      <span class="badge bg-light-success text-success  ms-auto">01</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 13. Custom Content -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Custom Content</h4>
                  <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action active" aria-current="true">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 text-white">
                          List group item heading
                        </h5>
                        <small>3 days ago</small>
                      </div>
                      <p class="mb-1">
                        Donec id elit non mi porta gravida at eget metus.
                        Maecenas sed diam eget risus varius blandit.
                      </p>
                      <small>Donec id elit non mi porta.</small>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small class="text-muted">3 days ago</small>
                      </div>
                      <p class="mb-1">
                        Donec id elit non mi porta gravida at eget metus.
                        Maecenas sed diam eget risus varius blandit.
                      </p>
                      <small class="text-muted">Donec id elit non mi porta.</small>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small class="text-muted">3 days ago</small>
                      </div>
                      <p class="mb-1">
                        Donec id elit non mi porta gravida at eget metus.
                        Maecenas sed diam eget risus varius blandit.
                      </p>
                      <small class="text-muted">Donec id elit non mi porta.</small>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 14. JavaScript behavior -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-3">JavaScript behavior</h5>
                  <div class="row">
                    <div class="col-5">
                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                          data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list"
                          href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list"
                          href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list"
                          href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                        <a class="list-group-item list-group-item-action" id="list-box-list" data-bs-toggle="list"
                          href="#list-box" role="tab" aria-controls="box">Box</a>
                        <a class="list-group-item list-group-item-action" id="list-inbox-list" data-bs-toggle="list"
                          href="#list-inbox" role="tab" aria-controls="inbox">Inbox</a>
                        <a class="list-group-item list-group-item-action" id="list-spam-list" data-bs-toggle="list"
                          href="#list-spam" role="tab" aria-controls="spam">Spam</a>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                          aria-labelledby="list-home-list">
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>

                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel"
                          aria-labelledby="list-profile-list">
                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel"
                          aria-labelledby="list-messages-list">
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>
                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                        </div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel"
                          aria-labelledby="list-settings-list">
                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>
                        </div>
                        <div class="tab-pane fade" id="list-box" role="tabpanel" aria-labelledby="list-box-list">
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>

                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                        </div>
                        <div class="tab-pane fade" id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>
                        </div>
                        <div class="tab-pane fade" id="list-spam" role="tabpanel" aria-labelledby="list-spam-list">
                          <p>
                            It is a long established fact that a reader will
                            be distracted by the readable content of a page
                            when looking at its layout. The point of using
                            Lorem Ipsum
                          </p>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of
                            type
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 15. List with checkbox -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">List with checkbox</h4>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="list1" />
                        <label class="form-check-label" for="list1">
                          Todo list 1
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="list2" />
                        <label class="form-check-label" for="list2">
                          Todo list 2
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="list3" />
                        <label class="form-check-label" for="list3">
                          Todo list 3
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="list4" />
                        <label class="form-check-label" for="list4">
                          Todo list 4
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="list5" />
                        <label class="form-check-label" for="list5">
                          Todo list 5
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 16. List with radio -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">List with radio</h4>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-btns" value="" id="radio1" />
                        <label class="form-check-label" for="radio1">
                          Todo list 1
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-btns" value="" id="radio2" />
                        <label class="form-check-label" for="radio2">
                          Todo list 2
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-btns" value="" id="radio3" />
                        <label class="form-check-label" for="radio3">
                          Todo list 3
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-btns" value="" id="radio4" />
                        <label class="form-check-label" for="radio4">
                          Todo list 4
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio-btns" value="" id="radio5" />
                        <label class="form-check-label" for="radio5">
                          Todo list 5
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 17. Numbered list item -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Numbered List item</h4>
                  <ol class="list-group list-group-numbered">
                    <li class="list-group-item m-0">Cras justo odio</li>
                    <li class="list-group-item m-0">Cras justo odio</li>
                    <li class="list-group-item m-0">Cras justo odio</li>
                    <li class="list-group-item m-0">Cras justo odio</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- 18. Numbered custom content list item -->
            <!-- -------------------------------------------- -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Numbered custom content List item</h4>
                  <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start m-0">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Cras justo odio
                      </div>
                      <span class="badge bg-primary">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start m-0">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Cras justo odio
                      </div>
                      <span class="badge bg-primary">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start m-0">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Cras justo odio
                      </div>
                      <span class="badge bg-primary">14</span>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
@endsection