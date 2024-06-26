<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag-->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item has-submenu {{ (Request::is('tecadd-carregador') or Request::is('tecnico') or Request::is('reparacaos') or Request::is('add-reparacao')) ? 'active' : '' }}" >
		        <a class="nav-link" href="#"> 
                    <i class="material-icons">ev_station</i>
                    <p class="sidebar-normal">Carregadores</p>
                </a>
		            <ul class="submenu collapse">
                    <!--<li class="nav-item {{ Request::is('teccarregadores') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('teccarregadores') }}">
                            <i class="material-icons">content_paste</i>
                            <p class="sidebar-normal">Listar Carrgadores</p>
                        </a>
                    </li>-->
                    <li class="nav-item {{ Request::is('tecadd-carregador') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('tecadd-carregador') }}">
                            <i class="material-icons">add_box</i>
                            <span class="sidebar-normal">Adicionar Carregador</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('tecnico') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('tecnico') }}">
                            <i class="material-icons">settings</i>
                            <span class="sidebar-normal">Reparação</span>
                        </a>
                    </li>
                    <!--<li class="nav-item {{ Request::is('add-tecnico') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('add-tecnico') }}">
                            <i class="material-icons">add_box</i>
                            <span class="sidebar-normal">Adicionar Reparação</span>
                        </a>
                    </li>-->
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
