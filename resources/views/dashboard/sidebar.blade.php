<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
			<li class="active">
              <a href="#">User Profile</a>
	          </li>
			<li>
	              <a href="{{route('account.dashboard')}}">Trade Now</a>
	          </li>
			  <li>
              <a href="#">Fixed Deposit</a>
	          </li>
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Wallet</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
				<li>
                    <a href="{{route('account.wallet')}}">OverView</a>
                </li>
                <li>
                    <a href="{{route('account.deposit')}}">Deposit</a>
                </li>
                <li>
                    <a href="{{route('account.withdraw')}}">Withdraw</a>
                </li>
	            </ul>
	          </li>
	          <li>
              <a href="{{route('account.team')}}">Team</a>
	          </li>
	        
			  <li>
              <a href="{{route('account.logout')}}">Logout</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>