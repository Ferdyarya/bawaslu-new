<x-app-layout title="Dashboard">
    {{--  <div class="container grid px-6 mx-auto">
         <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
             Dashboard
         </h2>
 
         <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
             Selamat Datang
         </h2> --}}
     <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1 class="m-0">Dashboard</h1>
           </div><!-- /.col -->
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
             </ol>
           </div><!-- /.col -->
         </div><!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-lg-12">
             <h4>Selamat Datang, 
              @if (Auth::guard('web')->check())
              {{Auth::guard('web')->user()->name}}
              @endif</h4>
             {{-- <div class="card">
               <div class="card-header border-0">
                 <h3 class="card-title">Staff</h3>
                 <div class="card-tools">
                   <a href="#" class="btn btn-tool btn-sm">
                     <i class="fas fa-download"></i>
                   </a>
                   <a href="#" class="btn btn-tool btn-sm">
                     <i class="fas fa-bars"></i>
                   </a>
                 </div>
               </div>
               <div class="card-body table-responsive p-0">
                 <table class="table table-striped table-valign-middle">
                   <thead>
                   <tr>
                     <th>Nama</th>
                     <th>Price</th>
                     <th>Sales</th>
                     <th>More</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                     <td>
                       <img src="AdminLTE-3.2.0/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                       Some Product
                     </td>
                     <td>$13 USD</td>
                     <td>
                       <small class="text-success mr-1">
                         <i class="fas fa-arrow-up"></i>
                         12%
                       </small>
                       12,000 Sold
                     </td>
                     <td>
                       <a href="#" class="text-muted">
                         <i class="fas fa-search"></i>
                       </a>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <img src="AdminLTE-3.2.0/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                       Another Product
                     </td>
                     <td>$29 USD</td>
                     <td>
                       <small class="text-warning mr-1">
                         <i class="fas fa-arrow-down"></i>
                         0.5%
                       </small>
                       123,234 Sold
                     </td>
                     <td>
                       <a href="#" class="text-muted">
                         <i class="fas fa-search"></i>
                       </a>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <img src="AdminLTE-3.2.0/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                       Amazing Product
                     </td>
                     <td>$1,230 USD</td>
                     <td>
                       <small class="text-danger mr-1">
                         <i class="fas fa-arrow-down"></i>
                         3%
                       </small>
                       198 Sold
                     </td>
                     <td>
                       <a href="#" class="text-muted">
                         <i class="fas fa-search"></i>
                       </a>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <img src="AdminLTE-3.2.0/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                       Perfect Item
                       <span class="badge bg-danger">NEW</span>
                     </td>
                     <td>$199 USD</td>
                     <td>
                       <small class="text-success mr-1">
                         <i class="fas fa-arrow-up"></i>
                         63%
                       </small>
                       87 Sold
                     </td>
                     <td>
                       <a href="#" class="text-muted">
                         <i class="fas fa-search"></i>
                       </a>
                     </td>
                   </tr>
                   </tbody>
                 </table>
               </div>
             </div> --}}
         <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
   
 </div>
     {{-- <div class="py-12">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                 <x-jet-welcome />
             </div>
         </div>
     </div> --}}
 </x-app-layout>