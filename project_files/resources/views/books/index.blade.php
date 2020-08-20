@extends('layouts.master')

@section('content')
    <div class="w3-container">
		@foreach($authors as $author)
		<div class="w3-row">
			<h2>{{ $author['firstnames'] . ' ' . $author['surname'] }}</h2>
			@if($author::has('books'))

				@foreach($author->books->sortBy(
					function ($bks) {
                        return $bks['loaned_to_user_id'].$bks['title'];
                    }) as $book)
				<div class="w3-col l6">
					<p>
						<strong>Title</strong>: {{ $book['title'] }}<br>
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
			@endif
		</div>
		@endforeach	
	</div>
@endsection