@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mb-4">
        <strong>Registros Anuales Realizados</strong>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total de Proyecciones</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProyecciones }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total de Detalles de Proyecciones:</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDetallesProyecciones }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Transacciones Realizadas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTransacciones }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Entradas en Proyeccion</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Salidas en Proyeccion</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChartSalidas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- index.blade.php -->
<div id="chartData" data-entradas="{{ json_encode($entradasProyecciones) }}"></div>

<div id="chartDataSalidas" data-entradas="{{ json_encode($salidasProyecciones) }}"></div>


<!-- index.blade.php -->

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Comparativa de Entradas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Total de Entradas de Proyecciones
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Total de Entradas de Transacciones
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Comparativa de Salidas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChartSalida"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Total de Salidas de Proyecciones
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Total de Salidas de Transacciones
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pasar los valores de PHP a JavaScript utilizando data attributes -->
<div id="chartTotals"
    data-total-entradas-proyecciones="{{ $totalEntradasProyecciones }}"
    data-total-entradas-transacciones="{{ $totalEntradasTransacciones }}"

    data-total-salidas-proyecciones="{{ $totalSalidasProyecciones }}"
    data-total-salidas-transacciones="{{ $totalSalidasTransacciones }}">
</div>

@endsection