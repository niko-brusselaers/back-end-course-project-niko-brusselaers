@yield("navigation")
<nav class="nav bg-dark">
    <a href="#" class="nav-item nav-link m-3 ">Home</a>
    <a href="{{route("admin.index")}}" class="nav-item nav-link m-3" >Admin</a>
    <a href="{{route("admin.createUser")}}" class="nav-item nav-link m-3" >create User</a>

    <a href="#" class="nav-item nav-link m-3">Loan System</a>
</nav>
