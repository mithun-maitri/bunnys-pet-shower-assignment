<nav class="navbar navbar-default navbar-fixed-top" id="myNavbar">
      <div class="container">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand" title="Home">Bunny's Pet Shower</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li role="presentation"
					class="{{Request::path() == 'services' ? 'active' : '' }}"><a 
					href="{{URL::to('/services')}}">Services</a></li> 
				<li role="presentation" 
					class="{{Request::path() == 'types' ? 'active' : '' }}"><a 
 					href="{{URL::to('/types')}}">Types</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>