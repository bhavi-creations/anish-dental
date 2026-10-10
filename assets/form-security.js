document.querySelectorAll('form[data-form-protected]').forEach((form) => {
    const image = form.querySelector('.form-security-image');
    const answer = form.querySelector('.form-security-answer');
    const refresh = form.querySelector('.form-security-refresh');
    const feedback = form.querySelector('.form-security-feedback');
    const submit = form.querySelector('button[type="submit"]');
    const readyAt = Date.now() + 3000;
    let imageReady = image.complete && image.naturalWidth > 0;
    let submitting = false;
    let expiryTimer;

    function update() {
        submit.disabled = submitting || !imageReady || answer.value.trim().length !== 6 || Date.now() < readyAt;
    }

    function startExpiryTimer() {
        clearTimeout(expiryTimer);
        expiryTimer = setTimeout(() => {
            imageReady = false;
            feedback.textContent = 'The security code has expired. Select New code to continue.';
            update();
        }, 600000);
    }

    image.addEventListener('load', () => {
        imageReady = true;
        refresh.disabled = false;
        feedback.textContent = '';
        startExpiryTimer();
        update();
    });
    image.addEventListener('error', () => {
        imageReady = false;
        refresh.disabled = false;
        feedback.textContent = 'Unable to load the security code. Reload the page to try again.';
        update();
    });
    answer.addEventListener('input', update);
    refresh.addEventListener('click', () => {
        imageReady = false;
        refresh.disabled = true;
        answer.value = '';
        feedback.textContent = 'Loading a new code...';
        const url = new URL(image.src, window.location.href);
        url.searchParams.set('refresh', '1');
        url.searchParams.set('_', Date.now().toString());
        image.src = url.toString();
        answer.focus();
        update();
    });
    form.addEventListener('submit', (event) => {
        if (submitting || !imageReady || Date.now() < readyAt || !form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }
        submitting = true;
        feedback.textContent = 'Submitting...';
        update();
    });
    window.addEventListener('pageshow', () => {
        submitting = false;
        update();
    });
    if (image.complete && !imageReady) {
        feedback.textContent = 'Unable to load the security code. Reload the page to try again.';
    }
    if (imageReady) {
        startExpiryTimer();
    }
    setTimeout(update, 3000);
    update();
});
