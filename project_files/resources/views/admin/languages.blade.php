@extends('layouts.admin')

@section('content')
	<br>
	<div class="w3-container">
		@include('components.errors')
		@include('components.info')

		<div>
			<button class="libBtnLg w3-btn w3-green w3-round-xlarge" onclick="document.getElementById('addLanguage').style.display='block'">Add new</button>
		</div>

		<!-- Start --- Add language Modal -->
		<div id="addLanguage" class="w3-modal">
		    <div class="w3-modal-content w3-animate-top w3-card-4">
			    <header class="w3-container w3-green">
				    <span onclick="document.getElementById('addLanguage').style.display='none'" 
				        class="w3-button w3-display-topright">&times;</span>
				    <h2>Add a new language</h2>
			    </header>
    			<form name="addLanguage" method="post" action="{{ route('admin.createLanguage') }}">
			    	<div class="w3-container">
			    		<div class="w3-row rowSpacing">
		    				<input class="w3-input" type="text" name="language" required placeholder="Language*">
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
		<table id="languageList" class="w3-table">
			<tr>
				<th onclick="w3.sortHTML('#languageList','.language', 'td:nth-child(1)')">Language <img src="https://img.icons8.com/material-sharp/16/000000/sort.png"/></th>
				<th onclick="w3.sortHTML('#languageList','.language', 'td:nth-child(3)')">Books <img src="https://img.icons8.com/material-sharp/16/000000/sort.png"/></th>
			</tr>
			@foreach($languages as $language)
			<tr class="language">
				<td>{{ $language['language'] }}</td>
				<td>{{ $language->books_count }}</td>
				<td>
					<button class="libTool w3-button w3-circle w3-large w3-hover-lime" onclick="document.getElementById('edit_{{ $language['id'] }}').style.display='block'">
						<img src="https://img.icons8.com/material-outlined/14/000000/edit.png"/>
					</button>
					<button class="libTool w3-button w3-circle w3-large w3-hover-red"  onclick="document.getElementById('delete_{{ $language['id'] }}').style.display='block'">
						<img src="https://img.icons8.com/material-outlined/14/000000/trash.png"/>
					</button>

					<!-- Start --- Edit language Modal -->
					<div id="edit_{{ $language['id'] }}" class="w3-modal">
					    <div class="w3-modal-content w3-animate-top w3-card-4">
						    <header class="w3-container w3-lime"> 
							    <span onclick="document.getElementById('edit_{{ $language['id'] }}').style.display='none'" 
							        class="w3-button w3-display-topright">&times;</span>
							    <h2>Edit language details</h2>
						    </header>
			    			<form name="edit_{{ $language['id'] }}" method="post" action="{{ route('admin.editLanguage') }}">
						    	<div class="w3-container">
						    		<div class="w3-row rowSpacing">
					    				<input class="w3-input" type="text" name="language" required placeholder="Language*" value="{{ $language['language'] }}">
						    		</div>
						    	</div>
						    	<footer class="w3-container w3-lime">
						    		<p>
						    			<input type="hidden" name="language_id" value="{{ $language['id'] }}">
						    			{{ csrf_field() }}
							    		<input class="w3-btn w3-round-xlarge w3-large w3-white" type="submit" value="Save" /><br>
							    		<small>* Required input</small>
							    	</p>
						      	</footer>
							</form>
					    </div>
					</div>
					<!-- End --- Edit language Modal -->

					<!-- Start --- Delete language Modal -->
					<div id="delete_{{ $language['id'] }}" class="w3-modal">
					    <div class="w3-modal-content w3-animate-top w3-card-4">
						    <header class="w3-container w3-red"> 
							    <span onclick="document.getElementById('delete_{{ $language['id'] }}').style.display='none'" 
							        class="w3-button w3-display-topright">&times;</span>
							    <h2>Delete language</h2>
						    </header>
			    			<form name="delete_{{ $language['id'] }}" method="post" action="{{ route('admin.deleteLanguage') }}">
			    				<input type="hidden" name="language_id" value="{{ $language['id'] }}">
						    	<div class="w3-container">
						    		@if ( $language->books_count > 0 )
						    		<p>
						    		This language currently has books in The Library catalogue and cannot be removed.
						    		</p>
						    		@else
							        <p><strong>WARNING!!</strong> - You are about to remove this language permanently from The Library.</p>
							        @endif
							    </div>
						    	<footer class="w3-container w3-red">
						    		<p>
						    			<a class="w3-btn w3-round-xlarge w3-large w3-white f_left" onclick="document.getElementById('delete_{{ $language['id'] }}').style.display='none'">
						    				Cancel
						    			</a>
						    			{{ csrf_field() }}
							    		<input class="w3-btn w3-round-xlarge w3-large w3-white f_right" {{ $language->books_count > 0 ? 'disabled' : '' }} type="submit" value="Confirm" />&nbsp;&nbsp;
							    	</p>
						      	</footer>
							</form>
					    </div>
					</div>
					<!-- End --- Delete language Modal -->
				</td>
			</tr>
			@endforeach
		</table>
		<div class="w3-row">
	        <div class="w3-col s12 w3-center">
	            {{ $languages->links() }}
	        </div>
	    </div>
	</div>
	<footer class="w3-center">
		<small>
			This page uses free icons; 
			<a href="https://icons8.com/icon/100711/sort">Sort icon by Icons8</a>
			<a href="https://icons8.com/icon/86373/edit">Edit icon by Icons8</a>
			<a href="https://icons8.com/icon/85081/trash">Trash icon by Icons8</a>
		</small>
	</footer>
@endsection