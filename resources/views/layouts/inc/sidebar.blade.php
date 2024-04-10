<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            Home Service
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item has-submenu {{ (Request::is('clientes') or Request::is('add-cliente') ) ? 'active' : '' }}" >
		        <a class="nav-link" href="#"> 
                    <i class="material-icons">persons</i>
                    <p class="sidebar-normal">Clientes</p>
                </a>
		            <ul class="submenu collapse">
                    <li class="nav-item {{ Request::is('clientes') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('clientes') }}">
                            <i class="material-icons">content_paste</i>
                            <p class="sidebar-normal">Listar Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('add-cliente') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('add-cliente') }}">
                            <i class="material-icons">playlist_add</i>
                            <span class="sidebar-normal">Adicionar Cliente</span>
                        </a>
                    </li>
		            </ul>
	        </li>
            <li class="nav-item has-submenu {{ (Request::is('carregadores') or Request::is('add-carregador') ) ? 'active' : '' }}" >
		        <a class="nav-link" href="#"> 
                    <i class="material-icons">swipe_left</i>
                    <p class="sidebar-normal">Carregadores</p>
                </a>
		            <ul class="submenu collapse">
                    <li class="nav-item {{ Request::is('carregadores') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('carregadores') }}">
                            <i class="material-icons">content_paste</i>
                            <p class="sidebar-normal">Listar Carrgadores</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('add-carregador') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('add-carregador') }}">
                            <i class="material-icons">playlist_add</i>
                            <span class="sidebar-normal">Adicionar Carregador</span>
                        </a>
                    </li>
		            </ul>
	        </li>
            <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">content_paste</i>
                    <p class="sidebar-normal">Categoria</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-category') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-category') }}">
                    <i class="material-icons">playlist_add</i>
                    <span class="sidebar-normal">Adicionar Categoria</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('services') }}">
                    <i class="material-icons">content_paste</i>
                    <span class="sidebar-normal">Serviços</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-services') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-services') }}">
                    <i class="material-icons">playlist_add</i>
                    <span class="sidebar-normal">Adicionar Serviço</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Encomendas</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}">
                    <i class="material-icons">persons</i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end
</script>
