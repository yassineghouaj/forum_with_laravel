@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                <a class="" href="{{ route('posts.create') }}"></a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>


        </tr>
        @foreach ($data as $key => $post)
            <tr>

                <div class="card">

                    <h5 class="card-header">{{ $post->title }}</h5>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p><br>
                        <!--<a href = "" class="btn btn-primary">reply</a><br>-->
                    </div>
                    <form action="/reply" method="post">
                    
						
                        @csrf
                        <div id="replys" style='display:block'>
                            <textarea name="reply" style="width: 80%; margin-left: 50px" class="card-text"
                                type="text"></textarea><br><br>
                            <input style="display:none" name='post_id' value={{ $post->id }}>
                            <input class="btn btn-primary" type='submit' value="Addreply" />
                            
                        </div>
                    </form>
                </div><br><br>

                {{-- @if (!empty($post->getRoleNames()))
@foreach ($user->getRoleNames() as $v) --}}
                {{-- <label class="badge badge-success">{{ $v }}</label> --}}
                {{-- @endforeach
@endif --}}
                {{-- </td>
<td>
<a class="btn btn-info" href="{{ route('posts.show',$user->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('posts.edit',$user->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $user->id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr> --}}
                <script>
                    function show() {
                        document.getElementById('replys').style.display = "block";
                    }
                </script>
        @endforeach
    </table>
    {{-- !! $data->render() !! --}}
    <p class="text-center text-primary"><small>AskUs</small></p>

@endsection
