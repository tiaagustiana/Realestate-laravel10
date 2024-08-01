<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        ADMIN <span>MEDIA</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="home"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Real Estate</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#propertyType" role="button" aria-expanded="false" aria-controls="propertyType">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="propertyType">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
              </li>
              <li class="nav-item">
                <a href="pages/email/read.html" class="nav-link">Add Type</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#propertyState" role="button" aria-expanded="false" aria-controls="propertyState">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property State</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="propertyState">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.state') }}" class="nav-link">All Type</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.state') }}" class="nav-link">Add State</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="amenities">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Amenities</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenities">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.amenitie') }}" class="nav-link">All Amenities</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">Add Amenitie</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="property">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.property') }}" class="nav-link">All Property</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.property') }}" class="nav-link">Add Property</a>
                </li>
              </ul>
            </div>
          </li>
        <li class="nav-item">
          <a href="{{ route('admin.package.history') }}" class="nav-link">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="link-title">Package History</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.property.message') }}" class="nav-link">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="link-title">Property Message</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#testimonialsManage" role="button" aria-expanded="false" aria-controls="testimonialsManage">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Testimonials Manage</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="testimonialsManage">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link">Lorem Ipsum</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Lorem Ipsum</a>
                </li>
              </ul>
            </div>
          </li>
        <li class="nav-item nav-category">User All Function</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#manageAgent" role="button" aria-expanded="false" aria-controls="manageAgent">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Manage Agent</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="manageAgent">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.agent') }}" class="nav-link">All Agent</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Add Agent</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#blogCategory" role="button" aria-expanded="false" aria-controls="blogCategory">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Blog Category</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="blogCategory">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/ui-components/accordion.html" class="nav-link">Lorem Ipsum</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Lorem Ipsum</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#blogPost" role="button" aria-expanded="false" aria-controls="blogPost">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Blog Post</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="blogPost">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/ui-components/accordion.html" class="nav-link">Lorem Ipsum</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Lorem Ipsum</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
            <a href="pages/apps/chat.html" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">Blog Comment</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/apps/chat.html" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">SMTP Setting</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/apps/chat.html" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">Site Setting</span>
            </a>
        </li>
        <li class="nav-item nav-category">Role & Permission</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rolePermission" role="button" aria-expanded="false" aria-controls="rolePermission">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Role & Permission</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="rolePermission">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.permission') }}" class="nav-link">All Permission</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                </li>
              </ul>
            </div>
          </li>
        <li class="nav-item nav-category">Documentation</li>
        <li class="nav-item">
          <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
