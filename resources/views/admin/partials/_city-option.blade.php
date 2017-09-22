<option value="-1">Select city</option>
@foreach($cities as $city)
    <option value="{{ $city->id }}">{{ $city->name }}</option>
@endforeach