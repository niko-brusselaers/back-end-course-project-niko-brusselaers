@yield("navigation")
<nav class="nav bg-dark">
    <a href="#" class="nav-item nav-link m-3 ">Home</a>
    <a href="{{route("loanSystem.index")}}" class="nav-item nav-link m-3" >Loan System</a>
    <a href="{{route("loanSystem.create")}}" class="nav-item nav-link m-3" >create loan</a>
    <a href="{{route("inventoryManagement.index")}}" class="nav-item nav-link m-3">inventory management</a>
</nav>
