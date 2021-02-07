@extends('projek_akhir.blank')

@push ('script-head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('sidebar-tools')
@if (Auth::user()->role=='penyedia')
  <li><a class="hotelin" href="hotel/create">Register Hotel</a></li>
@else
<li><a class="" href="#">My Transaction</a></li>
@endif
@endsection

@section('content')
<form method="POST" action="/profile" role="form" class="needs-validation" novalidate="" onsubmit="myButton.disabled = true; return true;">
    @csrf
    @error('submit')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
                    <div class="card-header">
                     <h4> {{Auth::user()->email}}'s Profile</h4 >
                        
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Real Name</label>
                            <input type="text" class="form-control" value="" name="nama" required="">
                            <div class="invalid-feedback">
                              Please fill in the your name
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{Auth::user()->email}}" name="e-mail" required="" disabled>
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="" name="phone_number">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            {{-- <input type="body" class="form-control" id="body" name="deskripsi" value="{{old('deskripsi', '') }}" placeholder="buat deskripsi" required> --}}
                            <textarea name="deskripsi" class="form-control my-editor">{!! old('deskripsi', $deskripsi ?? '') !!}</textarea>
                          </div>
                        </div>
                        
                    </div>
                    <div class="text-right">
                      <button class="btn btn-primary" onClick="this.form.submit(); this.disabled=true; this.value='Sending…'; ">Save</button>
                    </div>
                     
                        
                      
                  </form>
@endsection

@push ('scripts')
<script>
    function disableButton() {
        var btn = document.getElementById('btn');
        btn.disabled = true;
        btn.innerText = 'Posting...'
    }

</script>

<script>
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea.my-editor',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function (callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);

</script>
@endpush
