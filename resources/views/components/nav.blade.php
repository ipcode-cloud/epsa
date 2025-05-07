<nav class="bg-gray-800 text-white p-4">
    <ul class="flex space-x-4">
        <li><a href="{{route('dashboard')}}" class="hover:underline">Dashboard</a></li>
        <li><a href="{{route('products.index')}}" class="hover:underline">Products</a></li>
        <li><a href="{{route('stockin.index')}}" class="hover:underline">StockIn</a></li>
        <li><a href="{{route('stockout.index')}}" class="hover:underline">Stockout</a></li>
        <li><a href="{{route('report.index')}}" class="hover:underline">report</a></li>
        
        @if (Auth::check())
            <li><a href="/profile" class="hover:underline">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline bg-transparent border-none cursor-pointer">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li><a href="/login" class="hover:underline">Login</a></li>
            <li><a href="/register" class="hover:underline">Register</a></li>
        @endif
    </ul>
    
</nav>
