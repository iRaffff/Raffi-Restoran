@extends('templates.main')

@push('style')
@endpush

@section('container')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <form method="GET" action="{{ route('home') }}">

                    </form>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5 d-flex align-items-center">
                                <div class="stats-icon purple mb-2 me-3">
                                    <i class="iconly-boldChart"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold">Total Menu</h6>
                                    <h5 class="font-extrabold mb-2"> {{ $menuCount }} </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5 d-flex align-items-center">
                                <div class="stats-icon purple mb-2 me-3">
                                    <i class="iconly-boldChart"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold">Total Member</h6>
                                    <h5 class="font-extrabold mb-2"> {{ $memberCount }} </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5 d-flex align-items-center">
                                <div class="stats-icon green mb-2 me-3">
                                    <i class="iconly-boldBag"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold">Pendapatan</h6>
                                    <h6 class="font-extrabold mb-2">Rp 10.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5 d-flex align-items-center">
                                <div class="stats-icon red mb-2 me-3">
                                    <i class="iconly-boldGraph"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold">Jumlah Stok</h6>
                                    <h6 class="font-extrabold mb-2">{{ $stokCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('script')
@endpush
