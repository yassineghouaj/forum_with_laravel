@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
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
                        <div id="/reply" style='display:block'>
                            <textarea name="reply" style="width: 80%; margin-left: 50px" class="card-text"
                                type="text"></textarea><br><br>
                            <input style="display:none" name='post_id' value={{ $post->id }}>
                            <input class="btn btn-primary" type='submit' value="Addreply" />


                        </div>

                    </form>
                    <form action={{ '/delete/' . $post->id }} method="get">
                        @if (Auth::user()->name == 'Admin')
                            <input class="btn btn-danger" style="width:100px;" type='submit' value="delete post" />
                        @endif
                    </form>
                </div><br><br>



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
