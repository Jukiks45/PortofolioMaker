(function () {

    function showToast(message, type = 'success') {

        const colors = {
            success: '#10b981',
            error: '#ef4444',
            warning: '#f59e0b'
        };

        const icons = {
            success: 'fa-check-circle',
            error: 'fa-times-circle',
            warning: 'fa-exclamation-triangle'
        };

        const existing = document.querySelector('.app-toast');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'app-toast';

        Object.assign(toast.style, {
            position: 'fixed',
            bottom: '1.5rem',
            right: '1.5rem',
            background: colors[type] || colors.success,
            color: 'white',
            padding: '.75rem 1.25rem',
            borderRadius: '10px',
            boxShadow: '0 4px 16px rgba(0,0,0,.2)',
            fontSize: '.875rem',
            fontWeight: '600',
            zIndex: '9999',
            opacity: '0',
            transition: 'opacity .25s ease',
            display: 'flex',
            alignItems: 'center',
            gap: '.5rem'
        });

        toast.innerHTML = `
            <i class="fas ${icons[type] || icons.success}"></i> ${message}
        `;

        document.body.appendChild(toast);

        requestAnimationFrame(() => toast.style.opacity = '1');

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 2500);
    }

    // 👉 GLOBAL
    window.showToast = showToast;

})();
