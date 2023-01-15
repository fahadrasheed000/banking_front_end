<x-header />
<x-sidebar />
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5> Dashboard</h5>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/home"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="row">

                        <div class="col-xl-3 col-md-6">

                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Account Title</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ session('name') }}</h3>
                                        </div>
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Account No</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ session('account_number') }}</h3>
                                        </div>

                                    </div>
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Bank Name</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                {{ session('bank_name') }}</h3>
                                        </div>
                                        <div class="col" style="margin-left: 70px;">
                                            <h6 class="m-b-5 text-white">Balance</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                {{ number_format(session('balance'), 2) }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-money  text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row align-items-center m-b-30">

                                        <div class="col">
                                            <button onclick="showDepositModal()"
                                                class="btn btn-default">Deposit</button>
                                        </div>
                                        <div class="col">
                                            <button style="float:right"onclick="showTransferModal()" class="btn btn-info">Transfer</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
@include('includes.models.deposit_modal')
@include('includes.models.money_transfer_modal')
@include('includes.js_scripts.home_js')
