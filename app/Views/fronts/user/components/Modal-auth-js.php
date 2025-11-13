<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ======= ELEMENT REFERENCES =======
        const loginForm = document.getElementById('loginform');
        const registerForm = document.getElementById('registerform');
        const registerStep = document.getElementById('register-step');
        const otpStep = document.getElementById('otp-step');
        const resendBtn = document.getElementById('resendBtn');
        const timerDisplay = document.getElementById('timer');
        const validateOtpForm = document.getElementById('verifyotp');
        const validateBtn = document.getElementById('validateBtn');

        // Forgot password elements
        const forgotPwdForm = document.getElementById('forgotpwdform');
        const forgotModal = document.getElementById('forgotpwdmodal');
        const forgotUserStep = document.getElementById('f-user');
        const forgotOtpStep = document.getElementById('v-otp-step');
        const newPwdStep = document.getElementById('n-pwd-step');
        const fResendBtn = document.getElementById('f-resendBtn');
        const fpTimer = document.getElementById('fptimer');
        const fOtpForm = document.getElementById('f-verify-otp');
        const fpValidateBtn = document.getElementById('fpvalidateOtp');
        const newPwdForm = document.getElementById('newpwd');

        let timerInterval;

        // ======= UTILITY FUNCTIONS =======
        const notyfError = (msg) => notyf.open({
            type: 'error',
            message: msg
        });
        const notyfSuccess = (msg) => notyf.open({
            type: 'success',
            message: msg
        });

        async function postJSON(url, formData) {
            const res = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });
            return res.json();
        }

        function setupOTPInputs(containerSelector) {
            const inputs = document.querySelectorAll(`${containerSelector} .otp-input`);
            inputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length > 1) input.value = input.value.slice(0, 1);
                    if (input.value && index < inputs.length - 1) inputs[index + 1].focus();
                });
                input.addEventListener('keydown', e => {
                    if (e.key === 'Backspace' && !input.value && index > 0) inputs[index - 1].focus();
                });
            });
        }

        function clearOTPInputs(containerSelector) {
            document.querySelectorAll(`${containerSelector} .otp-input`).forEach(input => input.value = '');
        }

        function startTimer(timerElement, resendButton, duration = 180) {
            clearInterval(timerInterval);
            let remaining = duration;
            resendButton.disabled = true;

            timerInterval = setInterval(() => {
                const min = String(Math.floor(remaining / 60)).padStart(2, '0');
                const sec = String(remaining % 60).padStart(2, '0');
                timerElement.textContent = `Time remaining: ${min}:${sec}`;
                if (remaining <= 0) {
                    clearInterval(timerInterval);
                    resendButton.disabled = false;
                    timerElement.textContent = "OTP expired — you can resend now.";
                }
                remaining--;
            }, 1000);
        }

        function preventEnterSubmit(e) {
            if (e.key === 'Enter') e.preventDefault();
        }

        // ======= LOGIN FORM =======
        if (loginForm) {
            loginForm.addEventListener('keydown', preventEnterSubmit);
            loginForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const logbtn = loginForm.querySelector('button[type="submit"]');
                const originalText = logbtn.innerHTML;
                logbtn.disabled = true;
                logbtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

                const data = await postJSON(loginForm.action, new FormData(loginForm)).catch(() => null);
                if (!data) return notyfError('Network error, try again.');

                if (data.status === 'success') {
                    notyfSuccess(data.message);
                    setTimeout(() => data.redirect ? window.location.href = data.redirect : location.reload(), 1000);
                } else {
                    notyfError(data.message || 'Login failed.');
                }
                logbtn.disabled = false;
                logbtn.innerHTML = originalText;
            });
        }

        // ======= REGISTER FORM =======
        if (registerForm) {
            registerForm.addEventListener('keydown', preventEnterSubmit);
            registerForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const btn = registerForm.querySelector('button[type="submit"]');
                const original = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

                const data = await postJSON(registerForm.action, new FormData(registerForm)).catch(() => null);
                if (!data) return notyfError('Network error, try again.');

                if (data.status === 'success') {
                    notyfSuccess(data.message);
                    registerStep.classList.add('d-none');
                    otpStep.classList.remove('d-none');
                    document.querySelector('#verifyotp input[name="email"]').value =
                        registerForm.querySelector('input[name="email"]').value;
                    startTimer(timerDisplay, resendBtn);
                } else {
                    notyfError(data.message);
                }
                btn.disabled = false;
                btn.innerHTML = original;
            });
        }

        // ======= RESEND OTP (REGISTER) =======
        if (resendBtn) {
            resendBtn.addEventListener('click', async function() {
                const email = registerForm.querySelector('input[name="email"]').value;
                if (!email) return notyfError('Missing email.');

                resendBtn.disabled = true;
                resendBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Sending...';

                const data = await postJSON("<?= route_to('user.register.post') ?>", new URLSearchParams({
                    email,
                    method: 'otp'
                })).catch(() => null);
                if (!data) return notyfError('Resend failed.');

                if (data.status === 'success') {
                    notyfSuccess('New OTP sent!');
                    startTimer(timerDisplay, resendBtn);
                } else {
                    notyfError(data.message);
                }
                resendBtn.disabled = false;
                resendBtn.innerHTML = 'Resend email';
            });
        }

        // ======= VERIFY OTP (REGISTER) =======
        if (validateOtpForm && validateBtn) {
            validateBtn.addEventListener('click', async function(e) {
                e.preventDefault();
                let otp = '';
                document.querySelectorAll('#otp input').forEach(i => otp += i.value);
                if (otp.length < 6) return notyfError('Enter valid 6-digit OTP.');

                const formData = new FormData(validateOtpForm);
                formData.append('otp', otp);

                validateBtn.disabled = true;
                const orig = validateBtn.innerHTML;
                validateBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Verifying...';

                const data = await postJSON(validateOtpForm.action, formData).catch(() => null);
                if (!data) return notyfError('Network error.');

                if (data.status === 'success') {
                    notyfSuccess(data.message || 'OTP verified!');
                    setTimeout(() => data.redirect ? window.location.href = data.redirect : location.reload(), 1000);
                } else {
                    notyfError(data.message || 'Invalid or expired OTP.');
                    clearOTPInputs('#otp');
                }
                validateBtn.disabled = false;
                validateBtn.innerHTML = orig;
            });
        }

        // ======= FORGOT PASSWORD FLOW =======
        setupOTPInputs('#f-otp');
        setupOTPInputs('#otp');

        // Step 1: Submit forgot password form (send OTP)
        if (forgotPwdForm) {
            forgotPwdForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const btn = forgotPwdForm.querySelector('button[type="submit"]');
                const original = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

                const data = await postJSON(forgotPwdForm.action, new FormData(forgotPwdForm)).catch(() => null);
                if (!data) return notyfError('Network error.');

                if (data.status === 'success') {
                    notyfSuccess(data.message);
                    forgotUserStep.classList.add('d-none');
                    forgotOtpStep.classList.remove('d-none');
                    fOtpForm.querySelector('input[name="email"]').value =
                        forgotPwdForm.querySelector('input[name="email"]').value;
                    startTimer(fpTimer, fResendBtn);
                } else {
                    notyfError(data.message);
                }
                btn.disabled = false;
                btn.innerHTML = original;
            });
        }

        // Step 2: Verify OTP for forgot password
        if (fOtpForm && fpValidateBtn) {
            fpValidateBtn.addEventListener('click', async function(e) {
                e.preventDefault();
                let otp = '';
                document.querySelectorAll('#f-otp input').forEach(i => otp += i.value);
                if (otp.length < 6) return notyfError('Enter valid 6-digit OTP.');

                const formData = new FormData(fOtpForm);
                formData.append('otp', otp);

                fpValidateBtn.disabled = true;
                const original = fpValidateBtn.innerHTML;
                fpValidateBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Verifying...';

                const data = await postJSON(fOtpForm.action, formData).catch(() => null);
                if (!data) return notyfError('Network error.');

                if (data.status === 'success') {
                    notyfSuccess(data.message || 'OTP verified!');
                    forgotOtpStep.classList.add('d-none');
                    newPwdStep.classList.remove('d-none');
                    document.querySelector('#newpwd input[name="email"]')?.setAttribute('value', formData.get('email'));
                } else {
                    notyfError(data.message || 'Invalid OTP.');
                    clearOTPInputs('#f-otp');
                }
                fpValidateBtn.disabled = false;
                fpValidateBtn.innerHTML = original;
            });
        }

        // Step 3: Reset new password
        if (newPwdForm) {
            newPwdForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const btn = newPwdForm.querySelector('button[type="submit"]');
                const orig = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

                const formData = new FormData(newPwdForm);
                const pwd = formData.get('new-password');
                const repwd = formData.get('re-new-password');
                if (pwd !== repwd) {
                    notyfError('Passwords do not match.');
                    btn.disabled = false;
                    btn.innerHTML = orig;
                    return;
                }

                const data = await postJSON(newPwdForm.action, formData).catch(() => null);
                if (!data) return notyfError('Network error.');

                if (data.status === 'success') {
                    notyfSuccess('Password reset successful!');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    notyfError(data.message);
                }
                btn.disabled = false;
                btn.innerHTML = orig;
            });
        }

        // Step 4: Resend OTP (forgot password)
        if (fResendBtn) {
            fResendBtn.addEventListener('click', async function() {
                const email = forgotPwdForm.querySelector('input[name="email"]').value;
                if (!email) return notyfError('Missing email.');

                fResendBtn.disabled = true;
                fResendBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Sending...';

                const data = await postJSON("<?= route_to('user.forgot.post') ?>", new URLSearchParams({
                    email,
                    method: 'otp'
                })).catch(() => null);
                if (!data) return notyfError('Resend failed.');

                if (data.status === 'success') {
                    notyfSuccess('New OTP sent!');
                    startTimer(fpTimer, fResendBtn);
                } else {
                    notyfError(data.message);
                }
                fResendBtn.disabled = false;
                fResendBtn.innerHTML = 'Resend email';
            });
        }
    });
</script>