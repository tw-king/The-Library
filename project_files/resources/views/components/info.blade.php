@if(Session::has('info'))
    <div class="w3-row">
        <div class="w3-col s12">
            <p class="w3-panel w3-orange">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif