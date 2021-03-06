<!-- Modal para salir de la aplicacion -->
<div class="modal" tabindex="-1" role="dialog" id="modal-logOut">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">LogOut</h5>
            </div>
            <div class="modal-body">
                <p>¿Estas seguro de salir de tu cuenta ?
                </p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>