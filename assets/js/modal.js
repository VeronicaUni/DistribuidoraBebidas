document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modal-title");
    const modalBody = document.getElementById("modal-body");
    const closeBtn = document.querySelector(".close");

    document.querySelectorAll(".action-btn").forEach(button => {
        button.addEventListener("click", function () {
            const action = this.getAttribute("data-action");
            const productData = JSON.parse(this.getAttribute("data-product"));

            if (action === "create") {
                modalTitle.textContent = "Registrar Nuevo Producto";
                modalBody.innerHTML = `
                    <label>Nombre:</label>
                    <input type="text" placeholder="Ingrese el nombre" />
                    <label>Tipo:</label>
                    <input type="text" placeholder="Ingrese el tipo" />
                    <label>Cantidad:</label>
                    <input type="number" placeholder="Ingrese la cantidad" />
                    <label>Precio:</label>
                    <input type="number" placeholder="Ingrese el precio" />
                    <label>Proveedor:</label>
                    <input type="text" placeholder="Ingrese el proveedor" />
                    <button class="btn-save">Registrar</button>
                `;
            } else if (action === "view") {
                modalTitle.textContent = "Información del Producto";
                modalBody.innerHTML = `
                    <p><strong>Nombre:</strong> ${productData[0]}</p>
                    <p><strong>Tipo:</strong> ${productData[1]}</p>
                    <p><strong>Cantidad:</strong> ${productData[2]}</p>
                    <p><strong>Precio:</strong> $${productData[3]}</p>
                    <p><strong>Proveedor:</strong> ${productData[4]}</p>
                `;
            } else if (action === "edit") {
                modalTitle.textContent = "Actualizar Producto";
                modalBody.innerHTML = `
                    <label>Nombre:</label>
                    <input type="text" value="${productData[0]}" />
                    <label>Tipo:</label>
                    <input type="text" value="${productData[1]}" />
                    <label>Cantidad:</label>
                    <input type="number" value="${productData[2]}" />
                    <label>Precio:</label>
                    <input type="number" value="${productData[3]}" />
                    <label>Proveedor:</label>
                    <input type="text" value="${productData[4]}" />
                    <button class="btn-save">Guardar</button>
                `;
            } else if (action === "delete") {
                modalTitle.textContent = "Eliminar Producto";
                modalBody.innerHTML = `
                    <p>¿Seguro que deseas eliminar el producto <strong>${productData[0]}</strong>?</p>
                    <button class="btn-delete">Eliminar</button>
                `;
            }

            modal.style.display = "flex"; // Mostrar el modal
        });
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none"; // Cerrar el modal
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none"; // Cerrar si se hace clic fuera
        }
    });
});