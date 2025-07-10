function showForm(roleType) {
    // Ocultar la pantalla de selección
    document.getElementById('role-selection-screen').classList.add('hidden');
    
    // Ocultar todos los formularios
    const forms = document.querySelectorAll('.form-content');
    forms.forEach(form => form.classList.remove('active'));
    
    // Mostrar el formulario seleccionado
    const selectedForm = document.getElementById('form-' + roleType);
    if (selectedForm) {
        selectedForm.classList.add('active');
    }
}

function goBack() {
    // Mostrar la pantalla de selección
    document.getElementById('role-selection-screen').classList.remove('hidden');
    
    // Ocultar todos los formularios
    const forms = document.querySelectorAll('.form-content');
    forms.forEach(form => form.classList.remove('active'));
}

function changeRole(roleType) {
    // Ocultar todos los formularios
    const forms = document.querySelectorAll('.form-content');
    forms.forEach(form => form.classList.remove('active'));
    
    // Mostrar el formulario seleccionado
    const selectedForm = document.getElementById('form-' + roleType);
    if (selectedForm) {
        selectedForm.classList.add('active');
        
        // Actualizar todos los selects para mantener sincronización
        const selects = document.querySelectorAll('select[id^="role-select"]');
        selects.forEach(select => {
            select.value = roleType;
        });
    }
}

// Prevenir el envío del formulario y mostrar mensaje de confirmación
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.login-button');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Validar campos requeridos
            const activeForm = document.querySelector('.form-content.active');
            const requiredInputs = activeForm.querySelectorAll('input[required], select[required]');
            let allValid = true;
            
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    allValid = false;
                    input.style.borderColor = '#ff4444';
                } else {
                    input.style.borderColor = '';
                }
            });
            
            if (!allValid) {
                alert('Por favor, completa todos los campos requeridos.');
                return;
            }
            
            // Obtener el tipo de usuario del formulario activo
            let userType = '';
            if (activeForm.id === 'form-ciudadano') userType = 'Ciudadano';
            else if (activeForm.id === 'form-reciclador-oficio') userType = 'Reciclador de Oficio';
            else if (activeForm.id === 'form-empresa-recicladora') userType = 'Empresa Recicladora';
            
            alert(`¡Registro exitoso como ${userType}! Bienvenido a EcoSoftware.`);
        });
    });
    
    // Limpiar errores de validación cuando el usuario escriba
    document.addEventListener('input', function(e) {
        if (e.target.matches('input[required], select[required]')) {
            e.target.style.borderColor = '';
        }
    });
});