<style>
/* Estilos para el botón flotante */
.floating-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
}
</style>

<button type="button" class="btn floating-button" style="background-color: gold; border: none;" data-bs-toggle="modal"
    data-bs-target="#contactModal">
    +
</button>

<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Formulario de Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="src/actions/contacto.action.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="productos-interes" class="form-label">Productos de interés</label>
                        <textarea class="form-control" id="productos-interes" name="productos-interes" rows="3"
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="background-color: gold; border: none;"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn"
                            style="background-color: rgb(199, 67, 117); color: wheat; border: none;">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>