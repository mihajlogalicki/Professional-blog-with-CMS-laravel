@if($term = request('term'))
<div alert="alert alert-info">
    <p>Search Result for: <strong>{{ $term }}</strong></p>
</div>
@endif

