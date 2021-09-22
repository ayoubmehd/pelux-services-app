<li class="nav-item">
    <a href="{{ route('admin.users.index') }}"
       class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}"
       class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
        <p>Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.cities.index') }}"
       class="nav-link {{ Request::is('admin/cities*') ? 'active' : '' }}">
        <p>Cities</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.adresses.index') }}"
       class="nav-link {{ Request::is('admin/adresses*') ? 'active' : '' }}">
        <p>Adresses</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.services.index') }}"
       class="nav-link {{ Request::is('admin/services*') ? 'active' : '' }}">
        <p>Services</p>
    </a>
</li>


