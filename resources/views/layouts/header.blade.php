<header class="head">
      @auth
      <h2>
           <li>ログイン中です</li>
      </h2>
      @endauth
    
    <div>
      <h1><a id="homebutton" nowrap href="{{route('top')}}">こまめにチェッカー</a></h1>
      <div class="move_button">
        @auth
          <th>
            <?php 
              $user = Auth::user();
              if (isset($user->name)){ echo  $user->name ; } else { echo " "; }
            ?>
          </th>
            <form style="display: inline" method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="acount_button">
                <nobr><x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('Log Out') }}
                </nobr></x-dropdown-link>
              </button>
            </form>
            @endauth
          
          @guest
            <div class="acount_button">
              <button  onclick="location.href='{{route('register')}}'">新規登録</button>
              <button  onclick="location.href='{{route('login')}}'">ログイン</button>
            </div></div></div>
          @endguest
    </div>
  </div>
</header>