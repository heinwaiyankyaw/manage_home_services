  <div class="sidebar-wrapper sidebar-theme">

      <nav id="sidebar">

          <ul class="navbar-nav theme-brand flex-row  text-center">
              <li class="nav-item theme-logo">
                  <a href="index.html">
                      <img src="{{ asset('backend/assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                  </a>
              </li>
              <li class="nav-item theme-text">
                  <a href="index.html" class="nav-link"> HomeEase </a>
              </li>
          </ul>

          <ul class="list-unstyled menu-categories" id="accordionExample">
              <li class="menu active">
                  <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                          <span>Dashboard</span>
                      </div>
                      <div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-right">
                              <polyline points="9 18 15 12 9 6"></polyline>
                          </svg>
                      </div>
                  </a>
                  <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard"
                      data-parent="#accordionExample">
                      <li>
                          <a href="index.html"> Analytics </a>
                      </li>
                      <li>
                          <a href="index2.html"> Sales </a>
                      </li>
                  </ul>
              </li>
              <li class="menu">
                  <a href="#adminManagement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-shield">
                              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                          </svg>
                          <span>User Management</span>
                      </div>
                      <div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-right">
                              <polyline points="9 18 15 12 9 6"></polyline>
                          </svg>
                      </div>
                  </a>
                  <ul class="collapse submenu list-unstyled" id="adminManagement" data-parent="#accordionExample">
                      @if (auth()->user()->role->name == 'Super Admin' || auth()->user()->role->name == 'Admin')
                          <li><a href="{{ route('admin.admins.list') }}">Admins</a></li>
                          <li><a href="{{ route('admin.providers.list') }}">Providers</a></li>
                          <li><a href="{{ route('admin.users.list') }}">Customers</a></li>
                      @else
                          <li><a href="{{ route('provider.users.list') }}">Customers</a></li>
                      @endif
                  </ul>
              </li>
              @if (auth()->user()->role->name == 'Super Admin' || auth()->user()->role->name == 'Admin')
                  <li class="menu">
                      <a href="{{ route('admin.category.list') }}" aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="feather feather-layers">
                                  <polyline points="2 17 12 22 22 17"></polyline>
                                  <polyline points="2 12 12 17 22 12"></polyline>
                                  <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                              </svg>
                              <span>Category</span>
                          </div>
                      </a>
                  </li>
              @else
                  <li class="menu">
                      <a href="{{ route('provider.services.list') }}" aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
                                  <path
                                      d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z">
                                  </path>
                              </svg>
                              <span>Service</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('provider.bookings.list') }}" aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">
                                  <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                  <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                              </svg>
                              <span>Bookings</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('provider.payments.list') }}" aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-trello">
                                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                  </rect>
                                  <rect x="7" y="7" width="3" height="9"></rect>
                                  <rect x="14" y="7" width="3" height="5"></rect>
                              </svg>
                              <span>Payments</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('provider.reviews.list') }}" aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
                                  <path
                                      d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                  </path>
                              </svg>
                              <span>Reviews</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('provider.complaints.list') }}" aria-expanded="false"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                              <span>Complaints</span>
                          </div>
                      </a>
                  </li>
              @endif

              <li class="menu">
                  <a @if (auth()->user()->role->name == 'Service Provider') href="{{ route('provider.wallets.list') }}"
                  @else
                      href="{{ route('admin.wallets.list') }}" @endif
                      aria-expanded="false" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-dollar-sign">
                              <line x1="12" y1="1" x2="12" y2="23"></line>
                              <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                          </svg>
                          <span>Wallet List</span>
                      </div>
                  </a>
              </li>

          </ul>

      </nav>

  </div>
