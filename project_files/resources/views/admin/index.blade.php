@extends('layouts.admin')

@section('content')
	<br>
	<div class="w3-container">
		@include('components.errors')
		@include('components.info')

		<div class="w3-row">
			<div class="w3-col s2">
				<div>
					<button class="libBtnLg w3-btn w3-green w3-round-xlarge" onclick="document.getElementById('addBook').style.display='block'">Add new</button>
				</div>
			</div>
			<div class="w3-col s10">
				<p style="margin-bottom: 0px;"><small><span class="red">*</span> Book is on loan</small></p>
			</div>
		</div>

		<!-- Start --- Add book Modal -->
		<div id="addBook" class="w3-modal">
		    <div class="w3-modal-content w3-animate-top w3-card-4">
			    <header class="w3-container w3-green">
				    <span onclick="document.getElementById('addBook').style.display='none'" 
				        class="w3-button w3-display-topright">&times;</span>
				    <h2>Add a New Book</h2>
			    </header>
    			<form name="addBook" method="post" action="{{ route('admin.createBook') }}">
			    	<div class="w3-container">
			    		<div class="w3-row rowSpacing rowSpacingAbove">
		    				<input class="w3-input" type="text" name="title" required placeholder="Title*">
			    		</div>
			    		<div class="w3-row rowSpacing">
			    			<div class="w3-col s4">
						        <select name="author_id">
						        	<option disabled selected>Select author...</option>
							        @foreach($authors as $author)
							        <option value="{{ $author['id'] }}">{{ $author['surname'] . ', ' .  $author['firstnames']}}</option>
							        @endforeach
					        	</select>
					        </div>
			    			<div class="w3-col s4">
			    				<input class="w3-input" name="isbn" type="text" placeholder="ISBN 10 or 13 digits">
			    			</div>
					    </div>
					    <div class="w3-row rowSpacing">
			    			<div class="w3-col s12">
				    			<textarea class="w3-input" name="synopsis" placeholder="Synopsis*" rows="3"></textarea>
						    </div>
					    </div>
					    <div class="w3-row rowSpacing">
			    			<div class="w3-col s2 m3">
			    				<label class="blockLabel">First published</label>
			    			</div>
			    			<div class="w3-col s2 m2">
								<input class="w3-input" name="pubyear" type="number" min="1" max="{{ date('Y')+1 }}" value="{{ date('Y') }}" placeholder="1986">
			    			</div>
			    		</div>
			    	</div>
			    	<footer class="w3-container w3-green">
			    		<p>
			    			{{ csrf_field() }}
				    		<input class="w3-btn w3-round-xlarge w3-large w3-white" type="submit" value="Save" /><br>
				    		<small>* Required input</small>
				    	</p>
			      	</footer>
				</form>
		    </div>
		</div>
		<!-- End --- Add book Modal -->
		<hr>
		<table id="bookList" class="w3-table">
			<tr>
				<th onclick="w3.sortHTML('#bookList','.book', 'td:nth-child(1)')">Title <img src="https://img.icons8.com/material-sharp/16/000000/sort.png"/></th>
				<th onclick="w3.sortHTML('#bookList','.book', 'td:nth-child(2)')">Author <img src="https://img.icons8.com/material-sharp/16/000000/sort.png"/></th>
				<th onclick="w3.sortHTML('#bookList','.book', 'td:nth-child(3)')">Published <img src="https://img.icons8.com/material-sharp/16/000000/sort.png"/></th>
			</tr>
			@foreach($books as $book)
			<tr class="book">
				<td>{{ $book['title'] }} <span class="red">{{ ($book['loaned_to_user_id'] != -1 ? '*' : '') }}</span></td>
				<td>{{ $book['surname'] . ', ' . $book['firstnames'] }}</td>
				<td>{{ $book['pubyear'] }}</td>
				<td>
					<button class="libTool w3-button w3-circle w3-large w3-hover-lime" onclick="document.getElementById('edit_{{ $book['id'] }}').style.display='block'">
						<img src="https://img.icons8.com/material-outlined/14/000000/edit.png"/>
					</button>
					<button class="libTool w3-button w3-circle w3-large w3-hover-lime"  onclick="document.getElementById('view_{{ $book['id'] }}').style.display='block'">
						<img src="https://img.icons8.com/windows/14/000000/view-file.png"/>
					</button>
					<button class="libTool w3-button w3-circle w3-large w3-hover-red"  onclick="document.getElementById('delete_{{ $book['id'] }}').style.display='block'">
						<img src="https://img.icons8.com/material-outlined/14/000000/trash.png"/>
					</button>

					<!-- Start --- Edit book Modal -->
					<div id="edit_{{ $book['id'] }}" class="w3-modal">
					    <div class="w3-modal-content w3-animate-top w3-card-4">
						    <header class="w3-container w3-lime"> 
							    <span onclick="document.getElementById('edit_{{ $book['id'] }}').style.display='none'" 
							        class="w3-button w3-display-topright">&times;</span>
							    <h2>Edit book details</h2>
						    </header>
			    			<form name="edit_{{ $book['id'] }}" method="post" action="{{ route('admin.editBook') }}">
						    	<div class="w3-container">
						    		<div class="w3-row rowSpacing rowSpacingAbove">
					    				<input class="w3-input" type="text" name="title" required placeholder="Title" value="{{ $book['title'] }}">
						    		</div>
						    		<div class="w3-row rowSpacing">
						    			<div class="w3-col s4">
									        <select name="author_id">
									        	<option disabled>Select author...</option>
										        @foreach($authors as $author)
										        <option {{ $author['id'] == $book['author_id'] ? 'selected' : '' }} value="{{ $author['id'] }}">{{ $author['surname'] . ', ' .  $author['firstnames']}}</option>
										        @endforeach
								        	</select>
								        </div>
						    			<div class="w3-col s4">
						    				<input class="w3-input" name="isbn" type="text" placeholder="ISBN 10 or 13 digits" value="{{ $book['isbn'] }}">
						    			</div>
								    </div>
								    <div class="w3-row rowSpacing">
						    			<div class="w3-col s12">
							    			<textarea class="w3-input" name="synopsis" placeholder="Synopsis" rows="3">{{ $book['synopsis'] }}</textarea>
									    </div>
								    </div>
								    <div class="w3-row rowSpacing">
						    			<div class="w3-col s2 m3">
						    				<label class="blockLabel">First published</label>
						    			</div>
						    			<div class="w3-col s2 m2">
											<input class="w3-input" name="pubyear" type="number" min="1" max="{{ date('Y')+1 }}" value="{{ $book['pubyear'] }}" placeholder="1986">
						    			</div>
						    		</div>
						    	</div>
						    	<footer class="w3-container w3-lime">
						    		<p>
						    			<input type="hidden" name="book_id" value="{{ $book['id'] }}">
						    			{{ csrf_field() }}
							    		<input class="w3-btn w3-round-xlarge w3-large w3-white" type="submit" value="Save" />
							    	</p>
						      	</footer>
							</form>
					    </div>
					</div>
					<!-- End --- Edit book Modal -->

					<!-- Start --- View book Modal -->
					<div id="view_{{ $book['id'] }}" class="w3-modal">
					    <div class="w3-modal-content w3-animate-top w3-card-4">
						    <header class="w3-container w3-yellow"> 
							    <span onclick="document.getElementById('view_{{ $book['id'] }}').style.display='none'" 
							        class="w3-button w3-display-topright">&times;</span>
							    <h2>Book details</h2>
						    </header>
		    			   	<div class="w3-container">
		    			   		<div class="w3-row rowSpacingAbove">
		    			   			<div class="w3-col s1">
		    			   				<strong>Title</strong>:
		    			   			</div>
		    			   			<div class="w3-col s5">
		    			   				{{ $book['title'] }}
		    			   			</div>
		    			   			<div class="w3-col s2">
		    			   				<strong>Author</strong>:
		    			   			</div>
		    			   			<div class="w3-col s4">
		    			   				{{ $book->author['firstnames'] . ' ' . $book->author['surname'] }}
		    			   			</div>
		    			   		</div>
		    			   		<hr>
		    			   		<div class="w3-row rowSpacing">
		    			   			<div class="w3-col l12">
		    			   				<strong>Synopsis</strong>:<br>
		    			   				<textarea class="w3-input" readonly rows="4">{{ $book['synopsis'] }}</textarea>
		    			   			</div>
		    			   		</div>
		    			   		<div class="w3-row">
		    			   			<div class="w3-col s2">
		    			   				<strong>Published</strong>:
		    			   			</div>
		    			   			<div class="w3-col s4">
		    			   				{{ $book['pubyear'] }}
		    			   			</div>
		    			   			<div class="w3-col s1">
		    			   				<strong>ISBN</strong>:
		    			   			</div>
		    			   			<div class="w3-col s5">
		    			   				{{ $book['isbn'] }}
		    			   			</div>
		    			   		</div>
		    			   		@if ($book['loaned_to_user_id'] != -1)
		    			   		<hr>
		    			   		<div class="w3-row">
		    			   			<div class="w3-col s2">
		    			   				<strong>On loan to</strong>:
		    			   			</div>
		    			   			<div class="w3-col s4">
		    			   				{{ $book->user['name'] }}
		    			   			</div>
		    			   			<div class="w3-col s1">
		    			   				<strong>Until</strong>:
		    			   			</div>
		    			   			<div class="w3-col s5">
		    			   				{{ date('j F Y',strtotime($book['loaned_until'])) }}
		    			   			</div>
		    			   		</div>
		    			   		@endif
		    			   	</div>
					    	<footer class="w3-container w3-yellow">
					    		<p>
						    		&nbsp;
						    	</p>
					      	</footer>
						</div>
					</div>
					<!-- End --- View book Modal -->

					<!-- Start --- Delete book Modal -->
					<div id="delete_{{ $book['id'] }}" class="w3-modal">
					    <div class="w3-modal-content w3-animate-top w3-card-4">
						    <header class="w3-container w3-red"> 
							    <span onclick="document.getElementById('delete_{{ $book['id'] }}').style.display='none'" 
							        class="w3-button w3-display-topright">&times;</span>
							    <h2>{{ $book['title'] }}</h2>
						    </header>
			    			<form name="delete_{{ $book['id'] }}" method="post" action="{{ route('admin.deleteBook') }}">
			    				<input type="hidden" name="book_id" value="{{ $book['id'] }}">
						    	<div class="w3-container">
						    		@if ( $book['loaned_to_user_id'] > 0 )
						    		<p>
						    		This book is currently on loan and cannot be removed from The Library catalogue.
						    		</p>
						    		@else
							        <p><strong>WARNING!!</strong> - You are about to remove this book permanently from The Library.</p>
							        @endif
							    </div>
						    	<footer class="w3-container w3-red">
						    		<p>
						    			<a class="w3-btn w3-round-xlarge w3-large w3-white f_left" onclick="document.getElementById('delete_{{ $book['id'] }}').style.display='none'">
						    				Cancel
						    			</a>
						    			{{ csrf_field() }}
							    		<input class="w3-btn w3-round-xlarge w3-large w3-white f_right" type="submit" value="Confirm" {{ ($book['loaned_to_user_id'] != -1 ? 'disabled' : '') }} />&nbsp;&nbsp;
							    	</p>
						      	</footer>
							</form>
					    </div>
					</div>
					<!-- End --- Delete book Modal -->
				</td>
			</tr>
			@endforeach
		</table>
		<div class="w3-row">
	        <div class="w3-col s12 w3-center">
	            {{ $books->links() }}
	        </div>
	    </div>
	</div>
	<footer class="w3-center">
		<small>
			This page uses free icons; 
			<a href="https://icons8.com/icon/100711/sort">Sort icon by Icons8</a>
			<a href="https://icons8.com/icon/86373/edit">Edit icon by Icons8</a>
			<a href="https://icons8.com/icon/14514/view">View icon by Icons8</a>
			<a href="https://icons8.com/icon/85081/trash">Trash icon by Icons8</a>
		</small>
	</footer>
@endsection