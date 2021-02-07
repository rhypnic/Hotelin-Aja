@extends('projek_akhir.blank')

@push('style')
     <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush

@push('script-head')
    
@endpush

@section('header-content')
<h1>My Profile </h1>
@endsection

@section('sidebar-tools')
<li><a class="nav-link" href="#">my transaction</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Basic DataTables</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                 <a href="{{route('reservasi.create')}}" class="btn btn-primary btn-md ml-3 ">Tambahkan Reservasi</a>
                                 <br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                    aria-describedby="table-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Nama Penyewa
                                            </th>
                                            <th>
                                                Kamar
                                            </th>
                                            <th>
                                                Check In
                                            </th>
                                            <th>
                                                Check Out
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservasi as $key => $item) 
                                        <tr role="row" class="odd">
                                            <td>{{$key + $reservasi->firstitem()}}    
                                            </td>
                                            <td>{{$item ->profile_id}}</td>
                                            <td>{{$item ->kamar_id}}</td>
                                            <td>{{$item ->tggl_checkin}}</td>
                                            <td>{{$item ->tggl_checkout}}</td>
                                            <td>
                                                @if ($item->status == "Belum Checkin") 
                                                <div class="badge badge-info">{{$item ->status}}</div>
                                                @endif
                                                @if ($item->status == "Checked In") 
                                                <div class="badge badge-success">{{$item ->status}}</div>
                                                @endif
                                                @if ($item->status == "Checked Out") 
                                                <div class="badge badge-secondary">{{$item ->status}}</div>
                                                @endif
                                                @if ($item->status == "Cancelled") 
                                                <div class="badge badge-danger">{{$item ->status}}</div>
                                                @endif
                                                
                                            </td>
                                            <td>
                                            <form action="{{route('reservasi.destroy', ['reservasi'=>$item->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('reservasi.show', ['reservasi'=>$item->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('reservasi.edit', ['reservasi'=>$item->id])}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                            </form>
                                        </tr>
                                        @endforeach  
                                    </tbody>
                                </table>
                                {{$reservasi->links()}}
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing
                                    1 to 4 of 4 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="table-1_previous"><a
                                                href="#" aria-controls="table-1" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="table-1"
                                                data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item next disabled" id="table-1_next"><a
                                                href="#" aria-controls="table-1" data-dt-idx="2" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
      <!-- JS Libraies -->
  <script src="{{asset('stisla/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/assets/js/page/modules-datatables.js')}}"></script>
@endpush