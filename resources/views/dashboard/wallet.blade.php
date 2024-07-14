@extends('dashboard.layout')

@section('content')
<div id="content" class="p-4 p-md-5">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Portfolio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<h2 class="mb-4">Rise/Fall</h2>







<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Your Wallet</h1>
            <div class="wallet-info">
                <p><strong>USDT Balance:</strong> {{ $wallet->balance }} USDT</p>
                <!-- Add more wallet balances as needed -->
            </div>

            <h2 class="mt-4">Withdrawal History</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Amount (USDT)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawals as $withdrawal)
                        <tr>
                            <td>{{ $withdrawal->id }}</td>
                            <td>{{ $withdrawal->status }}</td>
                            <td>{{ $withdrawal->amount }}</td>
                            <td>{{ $withdrawal->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
@endsection
