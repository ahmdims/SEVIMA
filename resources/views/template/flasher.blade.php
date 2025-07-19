<?php $flashing = false; ?>
@if (session('success'))
    <?php $flashing = true; ?>
    <div class="alert alert-success alert-dismissible fade show position-fixed p-3 d-flex align-items-center"
        style="bottom: 1rem; right: 2rem; z-index: 100;" role="alert" id="alert-success">
        {{ session('success') }}
    </div>
@elseif (session('warning'))
    <?php $flashing = true; ?>
    <div class="alert alert-warning alert-dismissible fade show position-fixed p-3 d-flex align-items-center"
        style="bottom: 1rem; right: 2rem; z-index: 100;" role="alert" id="alert-warning">
        {{ session('warning') }}
    </div>
@elseif (session('error'))
    <?php $flashing = true; ?>
    <div class="alert alert-danger alert-dismissible fade show position-fixed p-3 d-flex align-items-center"
        style="bottom: 1rem; right: 2rem; z-index: 100;" role="alert" id="alert-danger">
        {{ session('error') }}
    </div>
@elseif (session('status'))
    <?php $flashing = true; ?>
    <div class="alert alert-info alert-dismissible fade show position-fixed p-3 d-flex align-items-center"
        style="bottom: 1rem; right: 2rem; z-index: 100;" role="alert" id="alert-info">
        {{ session('status') }}
    </div>
@elseif ($errors->any())
    <?php $flashing = true; ?>
    <div class="alert alert-danger alert-dismissible fade show position-fixed p-3 d-flex align-items-center"
        style="bottom: 1rem; right: 2rem; z-index: 100;" role="alert" id="alert-error">
        <ul class="ms-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($flashing)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alertElement = document.querySelector('div.alert');
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
            }, 5000);
        });
    </script>
@endif
