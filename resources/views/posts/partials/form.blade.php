<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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

    <title>{{$form_title}}</title>
    <style>
        .required:after {
            content: '*';
            color: red;
            padding-left: 5px;
        }

        .error {
            color: red;
        }

        label.error.fail-alert {
            font-weight: 500;
            border-radius: 4px;
            line-height: 1;
            padding: 2px 0 6px 6px;
        }

        input.valid.success-alert {
            border: 1px solid #4CAF50;
            color: green;
        }

        input.error.fail-alert {
            border: 1px solid red;
            color: red;
        }

        textarea.valid.success-alert {
            border: 1px solid #4CAF50;
            color: green;
        }

        textarea.error.fail-alert {
            border: 1px solid red;
            color: red;
        }
    </style>
</head>

<body class="container">
    <div class="row mt-5 d-flex justify-content-between">
        <div class="">
            <h3>{{$form_title}}</h3>
            <form id="postForm" action="{{$form_action}}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="post_id" value="{{@$post->id}}" placeholder="">

                <div class="form-group">
                    <label for="post_detail" class="required">Post Detail</label>
                    <textarea id="post_detail" class="form-control" name="details" rows="4" cols="50" maxlength="200">{{@$post->details}}</textarea>
                </div>

                <div class="form-group">
                    <label for="post_privacy" class="required">Post Privacy</label>
                    <input type="text" class="form-control" id="post_privacy" name="privacy" value="{{@$post->privacy}}">
                </div>

                <div class="form-group">
                    <label for="file-input" class="required">Image</label>
                    <input accept="image/*" id="file-input" type="file" name="filename" class="p-1"
                        @if (@$post->image == null) required @endif>
                    <br>
                    @if (@$post->image != null)
                        <img src="{{ asset('storage') }}/post_image/{{ @$post->image }}" height="20%" width="20%" />
                    @endif

                    <div id="preview"></div>
                </div>

                <button type="submit" id="submitBtn" class="btn {{$form_btn_class}}">{{$form_btn}} <i class="fa {{$form_btn_icon}} ml-2" aria-hidden="true"></i></button>
                <a href="{{url('posts')}}" type="button" class="btn btn-secondary ml-2">Back</a>
            </form>
        </div>
    </div>

    @include('posts.partials.js')
</body>

</html>
