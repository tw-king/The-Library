<div class="libNav w3-bar w3-purple">
	<a href="{{ route('books.index') }}" class="w3-bar-item {{ Route::currentRouteName() == 'books.index' ? 'w3-deep-purple' : '' }} w3-button">by Author</a>
	<a href="{{ route('books.GenreIndex') }}" class="w3-bar-item {{ Route::currentRouteName() == 'books.GenreIndex' ? 'w3-deep-purple' : '' }} w3-button">by Genre</a>
	@if(!Auth::check())
	<a href="{{ url('/login') }}" class="w3-bar-item w3-button">Sign-in</a>
	<a href="{{ url('/register') }}" class="w3-bar-item w3-button">Register</a>
	@else
	@if(Auth::user()->is_librarian)
	<a href="{{ route('admin.index') }}" class="w3-bar-item w3-button">Admin area</a>
	@endif
	<a href="{{ url('/logout') }}" class="w3-bar-item w3-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		Logout
	</a>
	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
	</form>
	<span class="f_right libUser">{{ Auth::user()->name }}</span>
	@endif
</div>