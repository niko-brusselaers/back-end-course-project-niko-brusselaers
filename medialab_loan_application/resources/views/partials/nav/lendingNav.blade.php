@yield("navigation")
<nav class="nav bg-dark">
    <a href="#" class="nav-item nav-link m-3 ">Home</a>
    <a href="{{route("inventoryManagement.index")}}" class="nav-item nav-link m-3" >Inventory Management</a>
    <a href="{{route("inventoryManagement.create")}}" class="nav-item nav-link m-3" >create item</a>

    <a href="#" class="nav-item nav-link m-3">Loan System</a>
</nav>
