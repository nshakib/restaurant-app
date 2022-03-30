@guest
                            @if (Route::has('login'))
                                <li class="scroll-to-section">
                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="scroll-to-section">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="submenu">
                            <a class="" href="javascript:;">
                                {{ Auth::user()->name }} <!-- show current user name -->
                            </a>

                            <ul>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                                <li><a href="#">Profile</a></li>
                            </ul>
                        </li>
                        @endguest