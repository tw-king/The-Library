@if(count($errors->all()))
    <div class="w3-row">
        <div class="w3-col s12">
            <div class="w3-panel w3-red">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif