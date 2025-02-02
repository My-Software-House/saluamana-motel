@extends('backend.layouts.template')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Customer</h4>
          <a href="{{ route('backend.customers.create') }}" class="btn btn-primary btn-md my-2">Tambah Customer</a>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone </th>
                  <th>Alamat </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($customers->count() === 0)
                    <tr>
                        <td colspan="8">Belum ada customers</td>
                    </tr>
                @endif
                @foreach($customers as $customer)
                  <tr>
                    <td>#</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td class="d-flex">
                        <a href="{{ route('backend.customers.edit', ['id' => $customer->id]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $customers->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
