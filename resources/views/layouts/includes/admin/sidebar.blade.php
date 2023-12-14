  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.index') }}">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.index') }}">Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create') }}">Add Product</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.brand.index') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
   <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.color.index') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Colors</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- partial -->
