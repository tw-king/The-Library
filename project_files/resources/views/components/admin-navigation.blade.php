<div class="libNav w3-bar w3-lime">
	<a href="{{ route('admin.index') }}" class="w3-bar-item {{ Route::currentRouteName() == 'admin.index' ? 'w3-green' : '' }} w3-button">Books</a>
	<a href="{{ route('admin.author.index') }}" class="w3-bar-item {{ Route::currentRouteName() == 'admin.author.index' ? 'w3-green' : '' }} w3-button">Authors</a>
	<a href="{{ route('admin.genre.index') }}" class="w3-bar-item {{ Route::currentRouteName() == 'admin.genre.index' ? 'w3-green' : '' }} w3-button">Genres</a>
	<!--
	<a href="{{ route('admin.language.index') }}" class="w3-bar-item {{ Route::currentRouteName() == 'admin.language.index' ? 'w3-green' : '' }} w3-button">Languages</a>
	-->
	@if(Auth::user()->is_admin)
	<a href="{{ route('admin.user.index') }}" class="w3-bar-item {{ Route::currentRouteName() == 'admin.user.index' ? 'w3-green' : '' }} w3-button">Users</a>
	@endif
	<a href="{{ route('books.index') }}" class="w3-bar-item w3-button">Library</a>

	@if(!Auth::check())
	<a href="{{ url('/login') }}" class="w3-bar-item w3-button">Sign-in</a>
	<a href="{{ url('/register') }}" class="w3-bar-item w3-button">Register</a>
	@else
	<a href="{{ url('/logout') }}" class="w3-bar-item w3-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		Logout
	</a>
	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
	</form>
	<span class="f_right libUser">{{ Auth::user()->name }}</span>
	@endif
</div>