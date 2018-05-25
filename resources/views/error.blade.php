@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>入力不備があります。</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif