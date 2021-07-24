<div class="col-xl-4 col-lg-5 mb-md-40">
        <ul class="step-steps steps-2">
                @if (userConnect()->type == 'ADMIN')
                <li><a href="{{ route('admin.dashboard') }}" class="add-res-tab">Administrador</a>
                </li>
                @endif
                <li class="{{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"> <a
                                href="{{ route('profile') }}" class="add-res-tab">Información General</a>
                </li>
                @if (userCommerceActive())
                <li class="{{ Route::currentRouteName() == 'commerce.update' ? 'active' : '' }}"> <a
                                href="{{ route('commerce.update', $commerce->slug) }}" class="add-res-tab">Perfil
                                Comercial</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'product.list' ? 'active' : '' }}"> <a
                                href="{{ route('product.list') }}" class="add-res-tab">Productos ({{ $countProducts }})</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'message.list' ? 'active' : '' }}"> <a
                                href="{{ route('message.list') }}" class="add-res-tab">Mensajes ({{ $countMessage }})</a>
                </li>
                {{--  <li class="{{ Route::currentRouteName() == 'comments' ? 'active' : '' }}"> <a
                                href="{{ route('profile') }}" class="add-res-tab">Comentarios</a>
                </li>  --}}
                @endif
                <li class="{{ Route::currentRouteName() == 'recipe.create' ? 'active' : '' }}"> <a
                                href="{{ route('recipe.create') }}" class="add-res-tab">Subir Recetas</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'profile.updateData' ? 'active' : '' }}"> <a
                                href="{{ route('profile.updateData') }}" class="add-res-tab">Datos Personales</a>
                </li>
                <li> <a href="{{ route('logout') }}" class="add-res-tab"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                title="" itemprop="url">Salir</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
        </ul>
</div>