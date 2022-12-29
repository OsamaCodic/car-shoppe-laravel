
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Post Create/Update
        $("#postForm").validate({
            errorClass: "jqError fail-alert",
            validClass: "valid success-alert",

            rules: {
                details: {
                    required: true
                },
                privacy: {
                    required: true
                }
            },
            messages: {
                details: {
                    required: "Details field is required.",
                },
                privacy: {
                    required: "Privacy field is required.",
                }
            },

            submitHandler: function(form) {
                $('#submitBtn').attr('disabled', true);
                $('#submitBtn').html("Please wait...")

                $.ajax({
                    url: $('#postForm').attr('action'),
                    type: $('#postForm').attr('method'),

                    dataType: "JSON",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        swal({
                            text: response.status,
                            timer: 5000,
                            icon: "success",
                            showConfirmButton: false,
                            type: "error"
                        })
                        setTimeout(function() {
                            location.href = response.redirect_url;
                        }, 1000);
                    }
                });
            }
        });
        // Post Create/Update
    });

    function test() {
        alert('fucntion wortking');
    }

    //post delete
    function delete_post(obj)
    {
        var url = "{{ url('posts') }}";
        var dltUrl = url+"/"+obj.id;
    
        swal({
                title: "Do you want to delete this post?",
                text: obj.name,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: dltUrl,
                    type: "DELETE",
                    data:{
                        _token:'{{ csrf_token() }}',
                        id:'id'
                    }           
                })
                .done(function(response) {
                    swal({
                        title: "post deleted!",
                        text: "post deleted permanently",
                        icon: "success",
                        timer: 5000,
                        buttons: false,
                        dangerMode: true,
                    })
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                })
            }
            else {
                swal("Cancelled", "Your post is safe :)", "error");
            }
        });
    }
    //post delete

    function previewImages() {
        var $preview = $('#preview').empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {
            if (!/\.(jpe?g|png)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            }
            var reader = new FileReader();
            $(reader).on("load", function() {
                $preview.append($("<img/>", {
                    src: this.result,
                    height: 100
                }));
            });
            reader.readAsDataURL(file);
        }
    }
    $('#file-input').on("change", previewImages);
</script>
