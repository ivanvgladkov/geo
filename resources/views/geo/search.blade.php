{{ Form::open(array('url' => 'geo')) }}
    {{ Form::label('lang', 'Language') }}
    {{ Form::select('lang', ['ru' => 'Russian', 'uk' => 'Ukrainian', 'en' => 'English']) }}

    <br>

    {{ Form::label('address', 'Address') }}
    {{ Form::text('address') }}

    <br>

    {{ Form::label('longitude', 'Longitude') }}
    {{ Form::number('longitude', '', ['min' => -180, 'max' => 180, 'step' => '0.01']) }}

    {{ Form::label('latitude', 'Latitude') }}
    {{ Form::number('latitude', '', ['min' => -90, 'max' => 90, 'step' => '0.01']) }}

    <br>

    {{ Form::label('placeId', 'Place ID') }}
    {{ Form::text('placeId') }}

    <br>

    {{ Form::submit() }}

{{ Form::close() }}

{{ var_dump($errors) }}
{{ var_dump($geoResponse) }}
