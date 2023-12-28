@extends('layout.main')
@section('title')Users List @endsection
@section('page-heading')Users List @endsection
@section('slug') > Users List @endsection
@section('content')

<link href="{{asset('assets/css/pages/users-page/usersPage.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />

<link href="{{asset('assets/css/select2/selectize.css')}}" rel="stylesheet" />

@include('cdns.dataTable')

<!-- for selectize -->
@include('cdns.selectize')

<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="searchInputBlock form-group animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" class="keywordSearch form-control form-control-sm withIcon" placeholder="search..."/>
        </div>
    </div>

    <div class="actionButtonsBlock flex-grow-1 d-flex align-items-center justify-content-end">
        @can('create-role')
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary animate__animated animate__fadeIn">            Add New Role</a> 
        @endcan

    </div>
</div>
<!-- topbar end -->
<div class="contentSection pt-3 mt-3">

   <div class="tableContainer">

     <div class="table-responsive">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col" style="width: 250px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"> Show</a>

                            @if ($role->name!='Super Admin')
                                @can('edit-role')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"> Edit</a>   
                                @endcan

                                @can('delete-role')
                                    @if ($role->name!=Auth::user()->hasRole($role->name))
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"> Delete</button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>No Role Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $roles->links() }}

    </div>

    </div>

</div>
@endsection