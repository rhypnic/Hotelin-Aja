@extends('projek_akhir.blank')

@section('sidebar-dashboard')
<li><a class="hotelin" href="hotel/create">Create Hotel</a></li>

@endsection

@section('content')
{{-- <div class="container"> --}}
  
  {{-- <div class="col"> --}}
    <div class="row">
    @foreach ($hotel as $key=>$item)
      {{-- <div class="card-header">
          
            <a class="nav-link active" href="#">Active</a> --}}
          
        
    <div class="col">
      <article class="article article-style-c">
        <div class="article-header">
          <div class="article-image" data-background="{{$item->gambar_hotel}}" style="background-image: url(&quot;{{$item->gambar_hotel}}&quot;);">
          </div>
        </div>
        <div class="article-details">
          <div class="article-title">
            <h2>{{$item->nama_hotel}}</h2>
          </div>
          <p>{{$item->deskripsi}}</p>
          <div class="article-user">
            <div class="article-user-details">
              <div class="user-detail-name">
                <a>{{$item->alamat}}</a>
            </div>
            <div class="text-job"><h4>${{$item->harga}}</h4></div>
            <a class="btn btn-primary d-md-flex justify-content-md-center" href="{{route('hotel.show', ['hotel'=>$item->id])}}" role="button">Show</a>
            </div>
            <a class="btn btn-primary d-md-flex justify-content-md-center" href="{{route('hotel.edit', ['hotel'=>$item->id])}}" role="button">Edit</a>
            
            

          </div>
        </div>
      </article>
    </div>
      {{-- </div> --}}
    
    @endforeach
  </div>
  {{-- </div> --}}
{{-- </div> --}}

{{-- <div class="container">
    <div class="row-fluid">

        @foreach ($hotel as $key=>$item)
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
              <article class="article">
                <div class="article-header">
                  <div class="article-image" data-background="{{$item->gambar_hotel}}" style="background-image: url(&quot;{{$item->gambar_hotel}}&quot;);">
                  </div>
                  <div class="article-title">
                    <h2><a href="#">{{$item->nama_hotel}}</a></h2>
                  </div>
                </div>
                <div class="article-details">
                  <p>{{$item->deskripsi}}</p>
                  <div class="article-cta">
                    <a href="#" class="btn btn-primary">Read More</a>
                  </div>
                </div>
              </article>
            </div>
    </div>

</div>
    
@endforeach --}}



    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-3">
      <article class="article">
        <div class="article-header">
          <div class="article-image" data-background="assets/img/news/img04.jpg" style="background-image: url(&quot;assets/img/news/img04.jpg&quot;);">
          </div>
          <div class="article-title">
            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
          </div>
        </div>
        <div class="article-details">
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. </p>
          <div class="article-cta">                           
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </article>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
      <article class="article">
        <div class="article-header">
          <div class="article-image" data-background="assets/img/news/img09.jpg" style="background-image: url(&quot;assets/img/news/img09.jpg&quot;);">
          </div>
          <div class="article-title">
            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
          </div>
        </div>
        <div class="article-details">
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. </p>
          <div class="article-cta">                           
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </article>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
      <article class="article">
        <div class="article-header">
          <div class="article-image" data-background="assets/img/news/img12.jpg" style="background-image: url(&quot;assets/img/news/img12.jpg&quot;);">
          </div>
          <div class="article-title">
            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
          </div>
        </div>
        <div class="article-details">
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. </p>
          <div class="article-cta">                           
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </article>
    </div>
  </div> --}}
  {{-- @include('sweetalert::alert'); --}}
@endsection

