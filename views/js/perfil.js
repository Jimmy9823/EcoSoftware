// FUNCIÓN PARA EDITAR PERFIL
        
        // Función para cargar datos del usuario en el modal de edición de perfil
        function cargarDatosModal(id, tipo_rol, nombre, identificacion, correo, telefono, 
                                 direccion, barrio, localidad, zona = '', horario = '', 
                                 representante = '', horario_empresa = '') {
            // Llenar campos generales
            document.querySelector('[name="id"]').value = id;
            document.querySelector('[name="tipo_rol"]').value = tipo_rol;
            document.querySelector('[name="nombre"]').value = nombre;
            document.querySelector('[name="identificacion"]').value = identificacion;
            document.querySelector('[name="correo"]').value = correo;
            document.querySelector('[name="telefono"]').value = telefono;

            // Llenar campos específicos del Ciudadano
            document.querySelector('[name="direccion"]').value = direccion;
            document.querySelector('[name="barrio"]').value = barrio;
            document.querySelector('[name="localidad"]').value = localidad;

            // Llenar campos específicos del Reciclador
            document.querySelector('[name="zona"]').value = zona;
            document.querySelector('[name="horario"]').value = horario;

            // Llenar campos específicos de Empresa
            document.querySelector('[name="representante"]').value = representante;
            document.querySelector('[name="horario_empresa"]').value = horario_empresa;
        }