<div class="col-sm-4">
    <div class="card">
      <img  class="card-img-top" style="border-radius:50%;" src="" height="100%" width="100%" alt="">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block mb-3">Home</a>
        <a href="{{ route('user.order') }}" class="btn btn-primary btn-sm btn-block mb-3">My orders</a>
     
        <a class="btn btn-danger btn-sm btn-block " href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form>
      </div>
    </div>
  </div>