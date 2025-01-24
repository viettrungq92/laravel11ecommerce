@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Users</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">All User</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
            <div class="wg-filter flex-grow">
                <form class="form-search">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." class="" name="name"
                            tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- <a class="tf-button style-1 w208" href="{{route('admin.contacts')}}"><i
                    class="icon-plus"></i>Add new</a> -->
        </div>
        <div class="wg-table table-all-user">
            <div class="table-responsive">
                @if (Session::has('status'))
                    <p class="alert alert-success">{{Session::get('status')}}</p>                
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Total Orders</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td class="pname">
                                <!-- <div class="image">
                                    <img src="{{asset('uploads/brands')}}/{{$user->image}}" alt="{{$user->name}}" class="image">
                                </div> -->
                                <div class="name">
                                    <a href="#" class="body-title-2">{{$user->name}}</a>
                                </div>
                            </td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td>0</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{route('admin.user.edit',['id'=>$user->id])}}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{route('admin.user.delete',['id'=>$user->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="item text-danger delete">
                                            <i class="icon-trash-2"></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    </div>
</div>
@endsection