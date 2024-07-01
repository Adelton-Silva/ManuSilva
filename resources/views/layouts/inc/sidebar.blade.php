<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            ManuSilva
           <!-- <img src="http://localhost:8000/public/image/logos/visa.png" alt="image">-->
        </a>
        <div class="carousel-item active">
            <!--<img src="{{asset('assets/images/1.jpg')}}" class="d-block w-100" alt="...">-->
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav"> 
            @if(Auth::user()->role_as == 1)
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            @endif
            <li class="nav-item has-submenu {{ (Request::is('clientes') or Request::is('add-cliente') ) ? 'active' : '' }}" >
		        <a class="nav-link" href="{{ url('clientes') }}"> 
                    <i class="material-icons">persons</i>
                    <p class="sidebar-normal">Clientes</p>
                </a>
	        </li>
            <li class="nav-item has-submenu {{ (Request::is('carregadores') or Request::is('add-carregador') 
                or Request::is('reparacaos') or Request::is('add-reparacao') or Request::is('em-reparacaos')) ? 'active' : '' }}" >
		        <a class="nav-link" href="#"> 
                    <i class="material-icons">ev_station</i>
                    <p class="sidebar-normal">Carregadores</p>
                </a>
		            <ul class="submenu">
                    <li class="nav-item {{ Request::is('carregadores') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('carregadores') }}">
                            <i class="material-icons">content_paste</i>
                            <p class="sidebar-normal">Listar Carrgadores</p>
                        </a>
                    </li>
                    @if(Auth::user()->role_as == 1)
                    <li class="nav-item {{ Request::is('reparacaos') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('reparacaos') }}">
                            <i class="material-icons">money</i>
                            <span class="sidebar-normal">Faturar Reparação</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item {{ Request::is('em-reparacaos') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('em-reparacaos') }}">
                            <i class="material-icons">settings</i>
                            <span class="sidebar-normal">Em Reparação</span>
                        </a>
                    </li>
		            </ul>
	        </li>
            @if(Auth::user()->role_as == 1)
            <li class="nav-item has-submenu {{ (Request::is('users') or Request::is('add-user') ) ? 'active' : '' }}" >
		        <a class="nav-link" href="{{ url('users') }}"> 
                    <i class="material-icons">persons</i>
                    <p class="sidebar-normal">Utilizadores</p>
                </a>
	        </li>
            @endif
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
