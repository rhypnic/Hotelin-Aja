@extends('projek_akhir.blank')



@section('content')
<div class="section-body">
            <h2 class="section-title">Hotel Anda</h2>
            
            <div class="card" style="width: 30rem;"  style="height: 15rem";>
              <div class="card-header">
                <h4>{{$hotel->nama_hotel}}</h4>
              </div>
              <div class="card-body">
                <p>{{$hotel->deskripsi}}</p>
              </div>
              <div class="row">
                  <div class="card-footer bg-whitesmoke">
                    Harga/malam = ${{$hotel->harga}}
                  </div>
                  <div class="card-footer bg-whitesmoke">
                      Alamat = {{$hotel->alamat}}
                  </div>

              </div>
            </div>
            
          </div>



    
@endsection