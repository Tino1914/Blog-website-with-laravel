@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label><b>Update Profile Image</b></label>
                <br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">




        </div>
        <div>
        <a href="/posts/create" class="btn btn-primary">Create Post</a></div>
        
        @if(count($posts) > 0)
                    <table class="table table-striped mt-5" >
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>

                            </th>
                            <th>

                            </th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                 
                       
                        
                        @endforeach
                    </table>
                    @else
                    <p>You have no posts</p>
                @endif
                   
    </div>
</div>
@endsection