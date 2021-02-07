@extends('projek_akhir.blank')

@section('sidebar-tools')
@if (Auth::user()->role=='penyedia')
  <li><a class="hotelin" href="hotel/create">Register Hotel</a></li>
@else
  <li><a class="" href="#">My Transaction</a></li>
@endif
@endsection

@section('content')
<div class="section-body">
            <h2 class="section-title">Hotel Anda</h2>
            
            <div class="card" style="width: 20rem;"  style="height: 15rem";>
              <div class="card-header">
                <h4>{{$hotel->nama_hotel}}</h4>
              </div>
              <div class="card-body">
                <p>{{$hotel->deskripsi}}</p>
              </div>
              <div class="col">
                  
                    <ul>
                      <br>
                   <li> Harga/malam = ${{$hotel->harga}}</li>
                    
                  
                  <div >
                    
                    <li>Alamat = {{$hotel->alamat}}</li>
                    <li>Owner = {{$hotel->penyedia->email}}</li>
                    </ul>
                  </div>
              <form action="/hotel/{{$hotel->id}}" method="post" class=text-right>
              @csrf
              @method('DELETE')
             <input type="submit" value="Delete Hotel" class="btn btn-danger btn-sm">
              </div>
            </form>
            </div>
            
          </div>



    
@endsection