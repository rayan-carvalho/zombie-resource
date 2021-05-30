@extends('layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">            
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>150</h3>

              <p>Saídas Realizadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>80</h3>
              <p>Entradas Realizadas</p>
            </div>
            <div class="icon">
              <i class="fas fa-dolly-flatbed"></i>
            </div>         
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>70</h3>
              <p>Recursos</p>
            </div>
            <div class="icon">
              <i class="fas fa-boxes"></i>
            </div>           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>44</h3>
              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="fas fa-box-tissue"></i>
            </div>            
          </div>
        </div>
        <!-- ./col -->
        <page-card title="Últimas Saídas" size="6" >
        <table class="table table-sm table-striped">
          <tbody>
            <tr>             
              <th>Recurso</th>
              <th>Usuário</th>
              <th>Cliente</th>
              <th>Quantidade</th>
              <th>Data</th>             
            </tr>
            @foreach($sales->sortByDesc('id'); as $sale)
            <tr>             
              <td>{{$sale->resource->name}}</td>
              <td>{{$sale->user->name}}</td>
              <td>{{$sale->client->name}}</td>
              <td > - {{$sale->amount}}</td> 
              <td>{{date('d/m/Y', strtotime($sale->created_at))}}</td>       
            </tr>
            @endforeach
          </tbody>
        </table>
      </page-card>
      <page-card title="Últimas Entradas" size="6" >
        <table class="table table-sm table-striped">
          <tbody>
            <tr>             
              <th>Recurso</th>
              <th>Usuário</th>              
              <th>Quantidade</th>
              <th>Data</th>             
            </tr>
            @foreach($stocks->sortByDesc('id'); as $stock)
            <tr>             
              <td>{{$stock->resource->name}}</td>
              <td>{{$stock->user->name}}</td>          
              <td > + {{$stock->amount}}</td> 
              <td>{{date('d/m/Y', strtotime($stock->created_at))}}</td>       
            </tr>
            @endforeach
          </tbody>
        </table>
      </page-card>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
