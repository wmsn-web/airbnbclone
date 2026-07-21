<?= $this->extend('fronts/templates/AdminLayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('headUtilities') ?>
<?= $this->endSection() ?>

<?= $this->section('assets') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h3 class="mb-4">Site Settings</h3>

<div class="table-responsive">
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Group</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settings as $s): ?>
                <tr>
                    <td class="ps-2 text-nowrap">
                        <?= esc($s['setting_key']) ?>
                    </td>

                    <td style="min-width:260px">
                        <input type="text"
                            class="form-control setting-value"
                            value="<?= esc($s['value']) ?>">
                    </td>

                    <td class="text-nowrap ">
                        <span class="badge badge-phoenix badge-phoenix-primary">
                            <?= esc($s['setting_group']) ?>
                        </span>
                    </td>

                    <td class="text-nowrap">
                        <button class="btn btn-sm btn-primary save-setting"
                            data-key="<?= esc($s['setting_key']) ?>"
                            data-type="<?= esc($s['type']) ?>"
                            data-group="<?= esc($s['setting_group']) ?>">
                            Save
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

<?= $this->section('jsUtls') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.querySelectorAll('.save-setting').forEach(btn => {
        btn.addEventListener('click', async () => {

            const row = btn.closest('tr');
            const value = row.querySelector('.setting-value').value;

            btn.disabled = true;
            btn.innerHTML = 'Saving...';

            const formData = new FormData();
            formData.append('setting_key', btn.dataset.key);
            formData.append('value', value);
            formData.append('type', btn.dataset.type);
            formData.append('setting_group', btn.dataset.group);

            try {
                const updateSettings = await fetch("<?= base_url('admin/settings/save') ?>", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const resp = await updateSettings.json();
                console.log(resp);
                
                // alert(resp.message);
                if (resp.success) {
                    notyf.open({
                        type: 'success',
                        message: resp.message
                    });

                } else if (resp.error) {
                    notyf.open({
                        type: 'error',
                        message: resp.message
                    });
                } else {
                    notyf.open({
                        type: 'error',
                        message: 'Something went wrong!'
                    });
                }

            } catch (e) {
                notyf.open({
                    type: 'error',
                    message: 'Failed to save setting!'
                });
                console.log(`Error : ${e}`);

            } finally {
                btn.disabled = false;
                btn.innerHTML = 'Save';
            }
        });
    });
</script>
<?= $this->endSection() ?>