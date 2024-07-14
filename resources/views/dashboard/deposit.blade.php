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

<h2 class="mb-4">Deposit Now</h2>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Deposit USDT (TRC20)</h1>
                <div class="form-group">
                    <label for="usdt-address">USDT TRC20 Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="usdt-address" value="YOUR_USDT_TRC20_ADDRESS" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="copyAddress()">Copy</button>
                        </div>
                    </div>
                </div>
                @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('deposits.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="txid">Transaction ID</label>
                    <input type="text" class="form-control" id="txid" name="txid" required>
                    @error('txid')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="amount">Amount (USDT)</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                    @error('amount')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <script>
        function copyAddress() {
            var copyText = document.getElementById("usdt-address");
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            navigator.clipboard.writeText(copyText.value).then(function() {
                alert("Copied the address: " + copyText.value);
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
            });
        }
    </script>


</div>











@endsection










