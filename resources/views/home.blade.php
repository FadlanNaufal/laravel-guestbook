@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>

          <div class="section-body">
              <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                  <div class="hero-inner">
                    <h2>Welcome, {{Auth::user()->name}}!</h2>
                    <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-address-card"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Parent Guest</h4>
                    </div>
                    <div class="card-body">
                      {{$parent}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Alumni Guest</h4>
                    </div>
                    <div class="card-body">
                    {{$alumni}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-id-card"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Other Guest</h4>
                    </div>
                    <div class="card-body">
                    {{$other}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-calendar"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Today Guest</h4>
                    </div>
                    <div class="card-body">
                    {{$today}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</div>
@endsection
