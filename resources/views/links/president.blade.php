<nav id="sidebar" class="px-0 bg-dark bg-gradient sidebar">
   <ul class="nav nav-pills flex-column invisible" data-qp-animate-type="fadeInLeft">
      <li class="logo-nav-item">
         <a class="navbar-brand" href="{{route('home')}}">
         <img src="/assets/img/photo.jpg">
         </a>
      </li>
      <li>
         <h6 class="nav-header">Actions</h6>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "home") ? ' active' : ''}}" href="{{route('home')}}">
         <i class="batch-icon batch-icon-browser-alt"></i>
         Dashboard 
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "addMemberForm") ? ' active' : ''}}" href="{{route('addMemberForm')}}">
         <i class="batch-icon batch-icon-star"></i>
         Add Member
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "pendingApproval") ? ' active' : ''}}" href="{{route('pendingApproval')}}">
         <i class="batch-icon batch-icon-star"></i>
         Admission Approval
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "AllMemberList") ? ' active' : ''}}" href="{{route('AllMemberList')}}">
         <i class="batch-icon batch-icon-compose-alt-2"></i>
         All Members
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "LobbyMemberList") ? ' active' : ''}}" href="{{route('LobbyMemberList')}}">
         <i class="batch-icon batch-icon-compose-alt-2"></i>
         My Lobby Members
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "allECS") ? ' active' : ''}}" href="{{route('allECS')}}">
         <i class="batch-icon batch-icon-compose-alt-2"></i>
         List All ECS
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "myBankDetails") ? ' active' : ''}}" href="{{route('myBankDetails')}}">
         <i class="batch-icon batch-icon-star"></i>
         My Bank Details
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "MembershipFeesHistory") ? ' active' : ''}}" href="{{route('MembershipFeesHistory')}}">
         <i class="batch-icon batch-icon-star"></i>
         My Payments
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "AllMembershipFeesList") ? ' active' : ''}}" href="{{route('AllMembershipFeesList')}}">
         <i class="batch-icon batch-icon-star"></i>
         Fees Approvals
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "LobbyMembershipFeesList") ? ' active' : ''}}" href="{{route('LobbyMembershipFeesList')}}">
         <i class="batch-icon batch-icon-star"></i>
         Lobby Fees Approval
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "AllMembershipFeesDefaultersList") ? ' active' : ''}}" href="{{route('AllMembershipFeesDefaultersList')}}">
         <i class="batch-icon batch-icon-star"></i>
         Defaulters
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link{{(request()->route()->getName() == "LobbyMembershipFeesDefaultersList") ? ' active' : ''}}" href="{{route('LobbyMembershipFeesDefaultersList')}}">
         <i class="batch-icon batch-icon-star"></i>
         Lobby Defaulters
         </a>
      </li>
      <!--
    
      <li class="nav-item">
         <a class="nav-link" href="loan-given.php">
         <i class="batch-icon batch-icon-star"></i>
         Loan Given
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="loan-detail.php">
         <i class="batch-icon batch-icon-star"></i>
         Loan Repayment Detail
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="certificate.php">
         <i class="batch-icon batch-icon-compose-alt-2"></i>
         Loan Clearence Certificate
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="pending-loan-priority.php">
         <i class="batch-icon batch-icon-star"></i>
         Pending Loan Priority
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="membership-detail.php">
         <i class="batch-icon batch-icon-star"></i>
         MemberShip-Detail
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="fund-with-him.php">
         <i class="batch-icon batch-icon-star"></i>
         Funds With Me
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="deposit-fund.php">
         <i class="batch-icon batch-icon-star"></i>
         Deposit Fund
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="expenses.php">
         <i class="batch-icon batch-icon-star"></i>
         Expenses
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="income.php">
         <i class="batch-icon batch-icon-star"></i>
         Income
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="member-cancel-table.php">
         <i class="batch-icon batch-icon-star"></i>
         MemberShip Cancellation
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="requesting-help.php">
         <i class="batch-icon batch-icon-star"></i>
         Acknowledge Help
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="grevence-form.php">
         <i class="batch-icon batch-icon-star"></i>
         Grevence Form
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="receipt.php">
         <i class="batch-icon batch-icon-star"></i>
         Receipt
         </a>
      </li>
    -->
   </ul>
</nav>