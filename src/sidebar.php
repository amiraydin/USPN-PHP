<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="../styles/header.css"> -->
<!-- The sidebar -->
<div class="sidebar">
    <a href="../"><i class="fa-solid fa-house-user"></i> Accueil</a>
    <a href="../test/src/groupe"><i class="fa-solid fa-users-viewfinder"></i> Groupe</a>
    <a href="../test/src/login">
        <i class="fa-solid fa-arrow-right-to-bracket"></i>
        Login
    </a>
    <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
</div>

<style>
    /* Style the sidebar - fixed full height */
    .sidebar {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 85px;
        left: 0;
        background-color: #F3F2F1;
        overflow-x: hidden;
        padding-top: 16px;
    }

    /* Style sidebar links */
    .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #000;
        display: block;
    }

    /* Style links on mouse-over */
    .sidebar a:hover {
        color: #3c11da;
    }
</style>