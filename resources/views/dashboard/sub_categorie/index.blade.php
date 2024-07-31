@extends('dashboard.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">           
            <div class="row">
                <div class="col d-flex justify-content-start ">
                    <h6 class=" mt-2 font-weight-bold text-dark ">Data Sub Categorie</h6>
                </div>
                <div class="col">
                    <div class="mb-0 d-flex justify-content-end">  
                        <a  class="btn btn-dark" href="{{url('create-subcategorie')}}"> Add Sub Categorie</a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead >
                        <tr class="bg-dark text-white" >
                            <th style="width: 5%">No</th>
                            <th style="width: 5%">Id </th>
                            <th style="width: 15%">Categorie</th>
                            <th style="width: 50%">Sub Categorie</th>                          
                            <th class="d-flex justify-content-center" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->categorie_id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td class="d-flex justify-content-center"  >
                                <div class="row">
                                    <div class="col ">
                                        <a class=" form-control btn btn-warning" href="{{url('edit-subcategorie-'. $item->id)}}" >Edit</a>
                                    </div>
                                    <div class="col">
                                        <form id="delete-form-{{ $item->id }}" style="display: inline;" action="{{url('/subcategorie/destroy/' .$item->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $item->id }})"  class="form-control btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subCategories->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    @endsection 