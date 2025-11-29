<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-room/Add-room'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane" role="tabpanel" aria-labelledby="add-room-wizard-tab4"
    id="add-room-wizard-tab4">
    <div class="row g-0">
        <div class="col-xxl-8">
            <form id="addPropertyWizardForm4" novalidate="novalidate" data-wizard-form="4">
                <h3 class="mb-6">Add room picture</h3>
                <div class="dropzone dropzone-multiple p-0 mb-5 dz-clickable"
                    id="my-awesome-dropzone" data-dropzone="data-dropzone">

                    <div class="dz-message text-body-tertiary text-opacity-85"
                        data-dz-message="data-dz-message">Drag your photo here<span
                            class="text-body-secondary px-1">or</span><button
                            class="btn btn-link p-0" type="button">Browse from
                            device</button><br><img class="mt-3 me-2"
                            src="../../../../assets/img/icons/image-icon.png" width="40" alt="">
                    </div>
                    <div class="dz-preview d-flex flex-wrap mt-3"></div>
                </div>
                <div class="mt-6 d-flex flex-wrap gap-2">
                    <button class="btn btn-primary px-6 px-sm-11" type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<!-- individual Js -->
<?= $this->section('wizard-script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('addPropertyWizardForm4');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                try {
                    const submitForm = await fetch(this.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });

                    const resp = await submitForm.json();
                    if (!resp) {
                        notyf.open({
                            type: 'error',
                            message: "Network error. Try again"
                        });
                    }
                    if (resp) {
                        console.log(resp);

                    }

                } catch (error) {
                    console.error(`Error : ${error}`);
                }

            })
        }
    });
</script>
<?= $this->endSection(); ?>