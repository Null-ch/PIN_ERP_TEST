<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="/">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="brand-logo" width="90px" height="70px">
        <div class="text-container">  
            <div><span class="brand-text font-weight-light">Enterprise</span></div>
            <div><span class="brand-text font-weight-light">Resourse</span></div>
            <div><span class="brand-text font-weight-light">Planning</span></div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
                <a href="{{route('products_index')}}" class="nav-link">
                    <p>Продукты</p>
                </a>
        </nav>
    </div>
</aside>
<style>
    .brand-link {
        display: flex;
        /* align-items: center; */
        padding: 0;
        margin: 0;
    }
    
    .brand-logo {
        display: block;
        padding: 0;
        margin: 0;
        border-bottom-right-radius: 10px; 
    }

    .text-container {
        display: flex;
        flex-direction: column;
        margin-left: 10px; /* отступ справа от картинки - установите значение по своему усмотрению */
        font-size: 16px;
    }
</style>