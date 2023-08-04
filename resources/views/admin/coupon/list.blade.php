@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
</div>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div
            class="d-flex align-items-center justify-content-between mb-4"
        >
            <h6 class="mb-0">Danh Sách Danh Mục</h6>
            <a class="btn btn-sm btn-primary" href="{{route('coupon.create')}}">Add</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-responsive">
            <table
                class="table text-start align-middle table-bordered table-hover mb-0"
            >
                <thead>
                    <tr class="text-white">
                        <th scope="col">ID</th>
                        <th scope="col">Tên Mã</th>
                        <th scope="col">Type</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupon as $key =>$ct)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$ct->name_coupons}}</td>
                        <td>{{$ct->type}}</td>
                        <td>{{$ct->value}}</td>
                        <td>
                            
                            
                                <form action="{{ route('coupon.destroy',$ct->id) }}" method="POST">
                                    <a
                                class="btn btn-sm btn-primary"
                                href="{{ route('coupon.edit',$ct->id) }}"
                                >Update</a
                            >
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-sm btn-primary">Delete</button>
                                </form>
                            
                        </td>
                    </tr>   
                    @endforeach               
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection