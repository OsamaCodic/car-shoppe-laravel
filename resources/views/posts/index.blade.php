<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    {{-- jQuery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    {{-- jQuery Validation js CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <title>Posts</title>
</head>

<body class="container">
    <div class="row mt-5 d-flex justify-content-between">
        <div class="table-responsive">
            <h3>Posts <a href="{{ url('posts/create') }}" class="btn btn-sm btn-success float-right m-2">Create <i class="fa fa-plus" aria-hidden="true"></i></a></h3>
            <small>(Total: {{ $posts->total() }})</small>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Details</th>
                        <th scope="col">Privacy</th>
                        <th scope="col">Images</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->details }}</td>
                            <td>{{ $post->privacy }}</td>
                            <td>
                                <img src="{{ asset('storage') }}/post_image/{{ @$post->image }}" width="100" />
                            </td>
                            <td>
                                <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <button onclick="delete_post({{ $post }})" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($posts->count() == 0)
                <p class="text-danger text-center">No post found...</p>
            @endif

            @if ($posts->count() > 0)
                <p>Showing {!! $posts->firstItem() !!} to {!! $posts->lastItem() !!}</p>
                {!! $posts->links() !!}
            @endif
        </div>
    </div>
    @include('posts.partials.js')
</body>

</html>
