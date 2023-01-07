
	@extends("layouts.dashboard.app")

	@section("style")
	<link href="{{asset ('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
    <link href="{{asset ('assets/plugins/select2/css/select2.min.css" rel="stylesheet') }}" />
	<link href="{{asset ('assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet') }}" />
    {{-- Stable wuth Tinymce version 5 not 6 --}}
    {{-- <script src="https://cdn.tiny.cloud/1/21oger5xyclar13jpk0cj0gf7uiuypz59kz0ybn013rfbeeg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
     <script src="https://cdn.tiny.cloud/1/21oger5xyclar13jpk0cj0gf7uiuypz59kz0ybn013rfbeeg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- <style>
        .imageuploadify {
            border: 2px dashed #d2d2d2;
            position: relative;
            min-height: 350px;
            min-width: 250px;
            max-width: 1000px;
            margin: auto;
            display: flex;
            padding: 0;
            flex-direction: column;
            text-align: center;
            background-color: #fff;
            color: #007bff;
        }
    </style> --}}
	@endsection
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Posts</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Posts</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Post</h5>
					  <hr/>
                        <form action = "{{route('admin.posts.store')}}" method ='POST'>
                            @csrf
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Post Title</label>
                                                <input type="email" class="form-control" id="inputProductTitle" placeholder="Enter post title">
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Post Slug</label>
                                                <textarea class="form-control" id="inputProductDescription" rows="3"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Post Excerpt</label>
                                                <textarea class="form-control" id="inputProductDescription" rows="3"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                    <label for="inputProductDescription" class="form-label">Post Category</label>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="rounded">
                                                                <div class="mb-3">
                                                                    <select class="single-select">
                                                                        @foreach ($categories as $key => $category)
                                                                            <option value="{{ $key }}">{{ $category }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Post Thumbanil</label>
                                                <input id="image-uploadify" type="file" accept="image/*" multiple>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Post Content</label>
                                                <textarea class="form-control" id="post_content" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
					</div><!--end row-->
				</div>

			</div>
		</div>


			</div> <!-- page content-->
		</div><!-- page wraper-->
		<!--end page wrapper -->
		@endsection
	
	@section("script")
	<script src="{{asset ('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    	<script src="{{asset ('assets/plugins/select2/js/select2.min.js') }}"></script>

	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		});

        $('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

        tinymce.init({
            selector: '#post_content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            image_title: true,
            automatic_uploads:true,
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],


            // images_upload_handler: function(blobinfo, success, failure)
            // {
            //     let formData = new FormData();
            //     let _token = $("input[name='_token']").val();

            //     let xhr = new XMLHttpRequest();
            //     xhr.open('post',"{{ route('admin.upload_tinymce_image') }}");

            //     xhr.onload = () => {
            //         console.log( xhr.status )
            //     }
            //     formData.append('_token',_token);
            //     formData.append('file',blobinfo.blob(), blobinfo.filename());
            //     xhr.send(formData);
            // }







            // selector: '#post_content',
            // plugins: 'advlist autolink lists link image media charmap print preview hr anchor pagebreak',
            // toolbar_mode: 'floating',
            // height: '500',
            // toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
            // toolbar_mode: 'floating',
            // image_title: true,
            // automatic_uploads: true,

            images_upload_handler: function(blobinfo, success, failure)
            {
                let formData = new FormData();
                let _token = $("input[name='_token']").val();
                let xhr = new XMLHttpRequest();
                xhr.open('post', "{{ route('admin.upload_tinymce_image') }}");
                xhr.onload = () => {
                    if( xhr.status !== 200 )
                    {
                        failure("Http Error: " + xhr.status);
                        return
                    }
                    let json = JSON.parse(xhr.responseText)
                    if(! json || typeof json.location != 'string')
                    {
                        failure("Invalid Json: " + xhr.responseText);
                        return
                    }
                    success( json.location )
                }
                formData.append('_token', _token);
                formData.append('file', blobinfo.blob(), blobinfo.filename());
                xhr.send( formData );
            }

        });





	</script>
	@endsection