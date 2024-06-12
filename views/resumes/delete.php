<?php if (!empty($errorMessage)) : ?>
    <div class="alert alert-danger" role="alert">
        <?=$errorMessage; ?>
    </div>
<?php endif; ?>

<script>
    setTimeout(function() {
        var errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            errorMessage.style.transition = 'opacity 1s';
            errorMessage.style.opacity = '0';
            setTimeout(function() {
                errorMessage.remove();
            }, 1000);
        }

        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = 'opacity 1s';
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.remove();
            }, 1000);
        }
    }, 10000);
</script>
