<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <!--<a href="#" class="simple-text logo-normal">
            ManuSilva
            <img src="http://localhost:8000/public/image/logos/visa.png" alt="image">
        </a>-->
        <div class="carousel-item active">
            <img src="{{asset('assets/images/1.jpg')}}" class="d-block w-100" alt="...">
        </div>
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
                            <i class="material-icons">add_box</i>
                            <span class="sidebar-normal">Adicionar Cliente</span>
                        </a>
                    </li>
		            </ul>
	        </li>
            <li class="nav-item has-submenu {{ (Request::is('carregadores') or Request::is('add-carregador') 
                or Request::is('reparacaos') or Request::is('add-reparacao') or Request::is('em-reparacaos')) ? 'active' : '' }}" >
		        <a class="nav-link" href="#"> 
                    <i class="material-icons">ev_station</i>
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
                            <i class="material-icons">add_box</i>
                            <span class="sidebar-normal">Adicionar Carregador</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('reparacaos') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('reparacaos') }}">
                            <i class="material-icons">money</i>
                            <span class="sidebar-normal">Faturar Reparação</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('em-reparacaos') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('em-reparacaos') }}">
                            <i class="material-icons">settings</i>
                            <span class="sidebar-normal">Em Reparação</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('add-reparacao') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('add-reparacao') }}">
                            <i class="material-icons">add_box</i>
                            <span class="sidebar-normal">Adicionar Reparação</span>
                        </a>
                    </li>
		            </ul>
	        </li>
            <li class="nav-item has-submenu {{ (Request::is('users') or Request::is('add-user') ) ? 'active' : '' }}" >
		        <a class="nav-link" href="#"> 
                    <i class="material-icons">persons</i>
                    <p class="sidebar-normal">Utilizadores</p>
                </a>
		            <ul class="submenu collapse">
                    <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('users') }}">
                            <i class="material-icons">persons</i>
                            <p class="sidebar-normal">Utilizadores</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('add-user') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('add-user') }}">
                            <i class="material-icons">add_box</i>
                            <span class="sidebar-normal">Registar Utilizador</span>
                        </a>
                    </li>
		            </ul>
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
