@extends('backend.layouts.template')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><a href="#" class="nav-link text-black h3">{{ $roomType->name }}</a></h4>
      <p class="card-description">Foto Utama</p>
      <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
        <a href="{{ asset('storage/' . $roomType->main_image) }}" class="fancylight popup-btn" data-fancybox-group="light">
          <img class="img-fluid" src="{{ asset('storage/' . $roomType->main_image) }}" alt="">
        </a>
      </div>

      {{-- {!! Form::open(['url' => '', 'class' => 'forms-sample', 'files' => true]) !!}
      <div class="form-group mt-2">
        {!! Form::label('main_image', 'Ganti Foto') !!}
        {!! Form::file('main_image', ['class' => 'form-control', 'placeholder' => 'Main Image']) !!}
      </div>
      {!! Form::close() !!} --}}

    </div>
  </div>
</div>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Upload Foto Tipe Kamar</h4>
      <form method="post" action="{{ route('backend.rooms-types.images.post') }}" enctype="multipart/form-data"
      class="dropzone" id="dropzone">
      <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">
      @csrf
      </form>
      <a href="" class="btn btn-primary mt-2">Upload</a>
      <h4 class="card-title mt-3">Foto Tipe Kamar</h4>
      <div class="portfolio-item row">
        @foreach ($imgRoomType as $img)
        <div class="item selfie col-lg-3 col-md-4 col-6 col-sm mt-3">
           <a href="{{ asset('storage/' . $img->image) }}" class="fancylight popup-btn" data-fancybox-group="light">
           <img class="img-fluid" src="{{ asset('storage/' . $img->image) }}" alt="">
           </a>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    Dropzone.options.dropzone =
     {
        // image_id: '';
        maxFilesize: 12,
        renameFile: function(file) {
          var dt = new Date()
          var time = dt.getTime()
          var splitname = file.name.split('.')
          return time+'.'+ splitname.pop()
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
            var name = file.upload.filename;
            console.log(name)
            $.ajax({
                type: 'DELETE',
                url: '{{ route("backend.rooms-types.images.delete") }}',
                data: {"filename": name, "id_room_type": "{{ $roomType->id }}", "_token": "{{ csrf_token() }}"},
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response)
        {
            console.log(response)
            console.log("success upload");
        },
        error: function(file, response)
        {
           return false;
        }
};
</script>
@endsection
