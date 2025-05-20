<div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Left Content-->
        <div class="text-dark order-1 order-md-1 d-flex align-items-center">
            <span id="currentDateTime" class="text-muted fw-semibold me-3"></span>
        </div>
        <!--end::Left Content-->

        <!--begin::Right Content-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-2">
            <li class="menu-item">
                <span class="text-muted fw-semibold me-1">{{ date('Y') }}&copy;</span>
                <a href="https://grelive.com" target="_blank" class="text-gray-800 text-hover-primary">{{ env('BUSINESS_NAME') }}</a>
            </li>
        </ul>
        <!--end::Right Content-->
    </div>
    <!--end::Footer container-->
</div>

<script>
    function updateDateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        document.getElementById('currentDateTime').textContent = now.toLocaleString('es-ES', options);
    }

    // Update date and time every second
    setInterval(updateDateTime, 1000);
    // Initialize date and time on load
    updateDateTime();
</script>