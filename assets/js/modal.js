document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modal-title");
    const modalBody = document.getElementById("modal-body");
    const closeBtn = document.querySelector(".close");

    document.querySelectorAll(".action-btn").forEach(button => {
        button.addEventListener("click", function () {
            const action = this.getAttribute("data-action");  // Acción: "create", "view", "edit", "delete"
            const module = this.getAttribute("data-module");  // Módulo: "product", "sale", "distributor", "order", "client"
            const data = JSON.parse(this.getAttribute("data-product") || "[]");  // Datos asociados (pueden ser datos de producto, cliente, etc.)
    
            // Llamar a la función que maneja el modal para la acción y módulo correspondiente
            handleModalAction(action, module, data);
        });
    });
    
    // Función para manejar el contenido del modal según la acción y el módulo
    function handleModalAction(action, module, data) {
        const modal = document.getElementById("modal");  // El modal
        const modalTitle = document.getElementById("modal-title");  // Título del modal
        const modalBody = document.getElementById("modal-body");  // Cuerpo del modal
    
        // Mostrar el modal
        modal.style.display = "flex";  
    
        // Cambiar título y contenido del modal según la acción y el módulo
        switch (action) {
            case "create":
                modalTitle.textContent = `Registrar Nuevo ${capitalizeFirstLetter(module)}`;
                modalBody.innerHTML = generateCreateForm(module);
                break;
    
            case "view":
                modalTitle.textContent = `Información del ${capitalizeFirstLetter(module)}`;
                modalBody.innerHTML = generateViewContent(module, data);
                break;
    
            case "edit":
                modalTitle.textContent = `Actualizar ${capitalizeFirstLetter(module)}`;
                modalBody.innerHTML = generateEditForm(module, data);
                break;
    
            case "delete":
                modalTitle.textContent = `Eliminar ${capitalizeFirstLetter(module)}`;
                modalBody.innerHTML = generateDeleteContent(module, data);
                break;
    
            default:
                modalTitle.textContent = "Acción no definida";
                modalBody.innerHTML = "<p>Acción no válida.</p>";
                break;
        }
    }
    
    // Función para capitalizar la primera letra de un string (por ejemplo: "product" => "Product")
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    
    // Genera el formulario de creación para cada módulo
    function generateCreateForm(module) {
        switch (module) {
            case "productos":
                return `
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
            case "ventas":
                return `
                    <label>Cliente:</label>
                    <input type="text" placeholder="Ingrese el nombre del cliente" />
                    <label>Producto:</label>
                    <input type="text" placeholder="Ingrese el producto" />
                    <label>Cantidad:</label>
                    <input type="number" placeholder="Ingrese la cantidad" />
                    <label>Precio:</label>
                    <input type="number" placeholder="Ingrese el precio" />
                    <button class="btn-save">Registrar Venta</button>
                `;
            case "distributores":
                return `
                    <label>Nombre del Distribuidor:</label>
                    <input type="text" placeholder="Ingrese el nombre del distribuidor" />
                    <label>Dirección:</label>
                    <input type="text" placeholder="Ingrese la dirección" />
                    <label>Teléfono:</label>
                    <input type="text" placeholder="Ingrese el teléfono" />
                    <button class="btn-save">Registrar Distribuidor</button>
                `;
            case "pedidos":
                return `
                    <label>Cliente:</label>
                    <input type="text" placeholder="Ingrese el nombre del cliente" />
                    <label>Producto:</label>
                    <input type="text" placeholder="Ingrese el producto" />
                    <label>Cantidad:</label>
                    <input type="number" placeholder="Ingrese la cantidad" />
                    <button class="btn-save">Registrar Pedido</button>
                `;
            case "clientes":
                return `
                    <label>Nombre:</label>
                    <input type="text" placeholder="Ingrese el nombre del cliente" />
                    <label>Correo:</label>
                    <input type="email" placeholder="Ingrese el correo" />
                    <label>Teléfono:</label>
                    <input type="text" placeholder="Ingrese el teléfono" />
                    <button class="btn-save">Registrar Cliente</button>
                `;
            default:
                return "";
        }
    }
    
    // Genera el contenido de vista para cada módulo
    function generateViewContent(module, data) {
        switch (module) {
            case "productos":
                return `
                    <p><strong>Nombre:</strong> ${data[0]}</p>
                    <p><strong>Tipo:</strong> ${data[1]}</p>
                    <p><strong>Cantidad:</strong> ${data[2]}</p>
                    <p><strong>Precio:</strong> $${data[3]}</p>
                    <p><strong>Proveedor:</strong> ${data[4]}</p>
                `;
            case "ventas":
                return `
                    <p><strong>Cliente:</strong> ${data[0]}</p>
                    <p><strong>Producto:</strong> ${data[1]}</p>
                    <p><strong>Cantidad:</strong> ${data[2]}</p>
                    <p><strong>Precio:</strong> $${data[3]}</p>
                `;
            case "distributores":
                return `
                    <p><strong>Nombre:</strong> ${data[0]}</p>
                    <p><strong>Dirección:</strong> ${data[1]}</p>
                    <p><strong>Teléfono:</strong> ${data[2]}</p>
                `;
            case "pedidos":
                return `
                    <p><strong>Cliente:</strong> ${data[0]}</p>
                    <p><strong>Producto:</strong> ${data[1]}</p>
                    <p><strong>Cantidad:</strong> ${data[2]}</p>
                `;
            case "clientes":
                return `
                    <p><strong>Nombre:</strong> ${data[0]}</p>
                    <p><strong>Correo:</strong> ${data[1]}</p>
                    <p><strong>Teléfono:</strong> ${data[2]}</p>
                `;
            default:
                return "";
        }
    }
    
    // Genera el formulario de edición para cada módulo
    function generateEditForm(module, data) {
        switch (module) {
            case "productos":
                return `
                    <label>Nombre:</label>
                    <input type="text" value="${data[0]}" />
                    <label>Tipo:</label>
                    <input type="text" value="${data[1]}" />
                    <label>Cantidad:</label>
                    <input type="number" value="${data[2]}" />
                    <label>Precio:</label>
                    <input type="number" value="${data[3]}" />
                    <label>Proveedor:</label>
                    <input type="text" value="${data[4]}" />
                    <button class="btn-save">Guardar</button>
                `;
            case "ventas":
                return `
                    <label>Cliente:</label>
                    <input type="text" value="${data[0]}" />
                    <label>Producto:</label>
                    <input type="text" value="${data[1]}" />
                    <label>Cantidad:</label>
                    <input type="number" value="${data[2]}" />
                    <label>Precio:</label>
                    <input type="number" value="${data[3]}" />
                    <button class="btn-save">Guardar Venta</button>
                `;
            case "distributores":
                return `
                    <label>Nombre del Distribuidor:</label>
                    <input type="text" value="${data[0]}" />
                    <label>Dirección:</label>
                    <input type="text" value="${data[1]}" />
                    <label>Teléfono:</label>
                    <input type="text" value="${data[2]}" />
                    <button class="btn-save">Guardar Distribuidor</button>
                `;
            case "pedidos":
                return `
                    <label>Cliente:</label>
                    <input type="text" value="${data[0]}" />
                    <label>Producto:</label>
                    <input type="text" value="${data[1]}" />
                    <label>Cantidad:</label>
                    <input type="number" value="${data[2]}" />
                    <button class="btn-save">Guardar Pedido</button>
                `;
            case "clientes":
                return `
                    <label>Nombre:</label>
                    <input type="text" value="${data[0]}" />
                    <label>Correo:</label>
                    <input type="email" value="${data[1]}" />
                    <label>Teléfono:</label>
                    <input type="text" value="${data[2]}" />
                    <button class="btn-save">Guardar Cliente</button>
                `;
            default:
                return "";
        }
    }
    
    // Genera el contenido de eliminación para cada módulo
    function generateDeleteContent(module, data) {
        return `
            <p>¿Seguro que deseas eliminar el ${module}? <strong>${data[0]}</strong>?</p>
            <button class="btn-delete">Eliminar</button>
        `;
    }
    

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none"; // Cerrar el modal
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none"; // Cerrar si se hace clic fuera
        }
    });
});