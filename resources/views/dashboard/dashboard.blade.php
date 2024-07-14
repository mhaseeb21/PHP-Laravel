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

<!-- Custom Header Bar -->
<div class="bg-light p-3 mb-4">
  <div class="row text-center">
    <div class="col-2 p-1 border">
      <span id="timer">5:00</span>
    </div>
    <div class="col-2 p-1 border">
      <button class="btn btn-success w-100" id="buyButton">Buy</button>
    </div>
    <div class="col-2 p-1 border">
      <button class="btn btn-danger w-100" id="sellButton">Sell</button>
    </div>
    <div class="col-2 p-1 border">
      <input type="text" class="form-control" id="userInput" placeholder="Enter value">
    </div>
    <div class="col-2 p-1 border">
      <span id="currentBalance" class="font-weight-bold">Balance: $1000</span>
    </div>
    <div class="col-2 p-1 border">
      <span id="result" class="font-weight-bold">Result: Buy/Sell</span>
    </div>
  </div>
</div>


<!-- TradingView Widget BEGIN -->
<div id="chartContainer" class="tradingview-widget-container" style="width:100%">
  <div class="tradingview-widget-container__widget" style="width:100%"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
  {
  "autosize": true,
  "symbol": "BINANCE:BTCUSDT",
  "interval": "5",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "allow_symbol_change": false,
  "save_image": false,
  "calendar": false,
  "hide_top_toolbar": true,
  "hide_volume": true,
  "support_host": "https://www.tradingview.com"
}
  </script>
</div>
<!-- TradingView Widget END -->

</div>









<!-- Add CSS for thinner boxes and buttons on mobile devices -->
<style>
  @media (max-width: 576px) {
    .row .col-2.p-1 {
      padding: 0.5rem !important;
    }
    .btn {
      padding: 0.25rem 0.5rem !important;
    }
    .form-control {
      padding: 0.25rem 0.5rem !important;
    }
  }
</style>





<script>
document.addEventListener("DOMContentLoaded", function() {
  const timerElement = document.getElementById('timer');
  const resultElement = document.getElementById('result');

  // Function to fetch the latest result from the backend
  function fetchLatestResult() {
    fetch("{{ route('user.result') }}")
      .then(response => response.json())
      .then(data => {
        resultElement.textContent = `Result: ${data.result}`;
        localStorage.setItem('latestResult', data.result);
      })
      .catch(error => console.error('Error fetching result:', error));
  }

  // Function to calculate the remaining time until the next 5-minute interval from 00 UTC
  function calculateRemainingTime() {
    const now = new Date();
    const nowUtc = new Date(now.getTime() + now.getTimezoneOffset() * 60000);
    const minutes = nowUtc.getUTCMinutes();
    const seconds = nowUtc.getUTCSeconds();
    const nextInterval = 5 - (minutes % 5);
    return nextInterval * 60 - seconds;
  }

  // Initial fetch on page load
  if (!localStorage.getItem('latestResult')) {
    fetchLatestResult();
  } else {
    resultElement.textContent = `Result: ${localStorage.getItem('latestResult')}`;
  }

  // Function to update the timer
  function updateTimer() {
    let time = localStorage.getItem('remainingTime') ? parseInt(localStorage.getItem('remainingTime')) : calculateRemainingTime();
    const interval = setInterval(() => {
      const minutes = Math.floor(time / 60);
      const seconds = time % 60;
      timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
      localStorage.setItem('remainingTime', time);
      time--;

      if (time < 0) {
        clearInterval(interval);
        localStorage.removeItem('remainingTime'); // Clear the remaining time
        timerElement.textContent = '5:00'; // Reset timer display
        fetchLatestResult(); // Fetch the latest result after the timer expires
        updateTimer(); // Restart the timer
      }
    }, 1000);
  }

  updateTimer(); // Start the timer

  // Function to resize the chart container
  const chartContainer = document.getElementById('chartContainer');
  const headerBar = document.querySelector('.bg-light');
  
  function resizeChart() {
    const availableHeight = window.innerHeight - headerBar.offsetHeight - 40; // Adjust 40px for padding/margins
    chartContainer.style.height = availableHeight + 'px';
  }

  window.addEventListener('resize', resizeChart);
  resizeChart();
});
</script>
@endsection
