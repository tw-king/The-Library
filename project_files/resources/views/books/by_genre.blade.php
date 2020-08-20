@extends('layouts.master')

@section('content')
	<br />
	<div class="w3-container">
		@foreach($genres as $genre)
		<div class="w3-row genreGroup">
			<button onclick="showHide('{{ $genre['genre'] }}')" class="w3-btn w3-block w3-{{ $genre['colour'] }} w3-left-align">
				<h2>{{ $genre['genre'] }}<span id="{{ $genre['genre'] }}CTRL" class="f_right"><img src="https://img.icons8.com/metro/26/000000/expand-arrow.png"/></span></h2>
			</button>
			@if($genre::has('books'))
			<div id="{{ $genre['genre'] }}" class="w3-hide">

				@foreach($genre->books->sortBy(
					function ($bks) {
                        return $bks['loaned_to_user_id'].$bks['title'];
                    }) as $book)
				<div class="w3-col l6" style="padding: 0px 10px;">
					<p>
						<strong>Title</strong>: {{ $book['title'] }}<br>
						<strong>Author</strong>: {{ $book->author['firstnames'] . ' ' . $book->author['surname'] }}<br>
						<strong>Synopsis</strong>: <span>{{ $book['synopsis'] }}<span><br>
						<strong>ISBN</strong>:  {{ $book['isbn'] }}&nbsp;&nbsp;
						<strong>First published</strong>:  {{ $book['pubyear'] }}
						
						@if($book['loaned_to_user_id'] === -1)
						<a href="borrow/{{ $book['id'] }}" class="libBtn w3-btn w3-lime w3-round-xlarge"><strong>Borrow</strong></a>
						@else
						<span class="libBtn w3-btn {{ date('Y-m-d') > $book['loaned_until'] ? 'w3-red' : 'w3-orange'}} w3-round-xlarge"><strong>{{ date('Y-m-d') > $book['loaned_until'] ? 'OVERDUE!' : 'On loan until'}}  {{ date('j M Y',strtotime($book['loaned_until'])) }}</strong></span>
						@endif
						@if($book['loaned_to_user_id'] === $user_id)
						<a href="return/{{ $book['id'] }}" class="libBtn w3-btn w3-green w3-round-xlarge"><strong>Return book</strong></a>
						@endif
					</p>
				</div>
				@endforeach
			</div>
			@endif
		</div>
		@endforeach	
	</div>
	<footer class="w3-center">
		<small>
			This page uses free icons; 
			<a href="https://icons8.com/icon/39942/expand-arrow">Expand Arrow icon by Icons8</a>,
			<a href="https://icons8.com/icon/39941/collapse-arrow">Collapse Arrow icon by Icons8</a>
		</small>
	</footer>
@endsection