@extends('layouts.main')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Change Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active">Change Password</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <section class="content">
      <div id="flash-message" data-title="{{ Session::get('title') }}" data-type="{{ Session::get('type') }}" data-message="{{ Session::get('message') }}"></div>
      <div class="row">
         <div class="col-12">
            <div class="card card-success">
               <div class="card-header"></div>
               <form class="form-horizontal" method="post" action="/auth/store-password" id="formChangePassword">
                  {{ csrf_field() }}
                  <div class="card-body">
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                           <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                           <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password Baru">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                           <button type="submit" class="btn btn-success mr-2"><i class="fas fa-key mr-2"></i>Change Password</button>
                           <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fas fa-undo-alt mr-2"></i>Cancel</a>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection