@extends('layout.master-admin')

@section('title', 'Akun')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Akun</h3>
                        <br>
                        <br>
                        
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Akun</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        
                            
                        </div>
                        
                        <div class="card-body">
                        <button type="button" class="btn btn-secondary btn-lg">
                            Tambah data
                        </button>


                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    
                                        <th>Nama</th>
                                        <th>Emai</th>
                                        
                                    
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <tr>
                                    @foreach ($products as $product)
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->email}}</td>
                                    <td></td>
    
                                    
                                </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                   


                    </div>

                </section>
            </div>       
@section('content')