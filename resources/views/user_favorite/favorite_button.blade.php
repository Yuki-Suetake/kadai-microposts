@if (Auth::user()->is_favorited($micropost->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-success"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $micropost->id], 'method' => 'post']) !!}
　        {!! Form::submit('Favorite', ['class' => "btn btn-primary"]) !!}
    {!! Form::close() !!}
@endif