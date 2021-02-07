@extends('projek_akhir.blank')

@section('sidebar-tools')
@if (Auth::user()->role=='penyedia')
  <li><a class="hotelin" href="hotel/create">Register Hotel</a></li>
@else
  <li><a class="" href="#">My Transaction</a></li>
@endif
@endsection
@section ('header-content')
@if (Auth::user()->role=='penyedia')
<h1>LIST OF YOUR HOTELS</h1>
@else
<h1>LIST OF AVAILABLE HOTELS</h1>
@endif
@endsection

@section('content')
{{-- <div class="container"> --}}
  
  {{-- <div class="col"> --}}
    <div class="row">
    @foreach ($hotel as $key=>$item)
      {{-- <div class="card-header">
          
            <a class="nav-link active" href="#">Active</a> --}}
          
        
    <div class="col d-flex justify-content-start">
      <article class="article article-style-c" style="width: 18rem;"  style="height: 15rem";> 
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
            <div class="d-flex justify-content-between">
            
              @if (Auth::user()->role=='penyedia')
              <a type="submit" href="{{route('hotel.edit', ['hotel'=>$item->id])}}" class="btn btn-primary btn-sm">Edit</a>
              <a type="submit" href="{{route('hotel.show', ['hotel'=>$item->id])}}" class="btn btn-primary btn-sm">Show</a>
              @else
              <a type="submit" href="#" class="btn btn-primary btn-sm">Reservasi</a>
              @endif
            
            
            </div>
            
          </div>
            

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

