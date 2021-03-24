@if ($errors->any())

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif


@if(Session::has('errormsg'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{ Session::get('errormsg') }}</p>
    </div>
@endif