<nav class="navbar navbar-light navbar-expand-md sticky">
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navBar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navBar">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-->
                <div class="col-lg-3 sidebar" id="leftNav">
                    <a href="index.php" class="navbar-brand border-bottom text-center text-white d-block mb-4"> <?=strtoupper($_SESSION['username'])?></a>
                    <div class="border-bottom pb-3">
                        <img src="../img/admin.icon.png" alt="" class="rounded-circle mr-3" width="50" />
                        <a href="index.php" class="text-light">
                            <?=strtoupper($_SESSION['username'])?></a>
                    </div>
                    <ul class="flex-column navbar-nav mt-4">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-white p-3 mb-2 sidelink"><i class="fas fa-home fa-lg text-light mr-3"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#collapseBook" class="nav-link text-white p-3 mb-2 sidelink" data-toggle="collapse"><i class="fas fa-book fa-lg text-light mr-4"></i>Books</a>
                            <div class="collapse" id="collapseBook">
                                <a href="?content=view-book" class="nav-link">
                                    <div class="card card-body expand-card">
                                        View Books
                                    </div>
                                </a>
                                <a href="?content=add-book" class="nav-link">
                                    <div class="card card-body expand-card">Add Books
                                    </div>
                                </a>
                                <a href="?content=add-genre" class="nav-link">
                                    <div class="card card-body expand-card">Genre</div>
                            </div></a>
                        </li>
                        <li class="nav-item">
                            <a href="#collapsePage" class="nav-link text-white p-3 mb-2 sidelink" data-toggle="collapse"><i class="far fa-sticky-note fa-lg text-light mr-3"></i>Page</a>
                            <div class="collapse" id="collapsePage">
                                <a href="?content=view-page" class="nav-link">
                                    <div class="card card-body expand-card">
                                        View Page
                                    </div>
                                </a>
                                <a href="?content=add-page" class="nav-link">
                                    <div class="card card-body expand-card">
                                        Add Page
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="?content=slideshow" class="nav-link text-white p-3 mb-2 sidelink"><i class="fas fa-images fa-lg text-light mr-4"></i>Slideshow</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End of side nav-->
    <!--Top Nav-->
    <div class="col-lg-9 ml-auto bg-dark py-2 fixed-top" id="top-navbar">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
            </div>
            <div class="col-md-5">
                <form action="#">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." id="" />
                        <button type="button" class="btn btn-white">
                            <i class="fas fa-search text-danger"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-envelope fa-lg text-muted"></i></a>
                    </li>
                    <li href="#" class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-bell fa-lg text-muted"></i>
                        </a>
                    </li>
                    <li class="nav-item ml-md-auto">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#signout"><i class="fas fa-sign-out-alt fa-lg text-danger"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!--End of Top nav-->

</nav>
<!--Modal-->
<div class="modal fade" id="signout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Why won't you stay here longer?</h4>
                <button class="close btn" data-dismiss="modal" type="button">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <p>Press logout to leave...</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Stay Here
                </button>
                <a href="logout.php" class="btn btn-danger" type="button">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
<!--End of Modal-->