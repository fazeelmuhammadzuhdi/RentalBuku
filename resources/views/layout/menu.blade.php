@if (Auth::user())

    @if (Auth::user()->role_id == 1)
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('books') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Books
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categories') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Categories
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('rent.logs') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Rent log
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('rental-buku') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Book Rent
                </p>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('book-list') }}" class="nav-link">
                <i class="nav-icon fas fa-angry text-red"></i>
                <p>
                    BookList
                </p>
            </a>
        </li>
    @endif
@else
    <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link">
            <i class="nav-icon fas fa-angry text-red"></i>
            <p>
                Login
            </p>
        </a>
    </li>
@endif
