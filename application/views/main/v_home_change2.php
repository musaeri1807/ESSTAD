<div class="container">
  <h2>Info Keamanan</h2>
  <div>
    <p><b>ID:</b> <?= $user['id_users'] ?></p>
    <p><b>Email:</b> <?= $user['email'] ?> <button onclick="openModal('email')">Ubah</button></p>
    <p><b>Nama:</b> <?= $user['name_users'] ?> <button onclick="openModal('name_users')">Ubah</button></p>
    <p><b>Telepon:</b> <?= $user['phone'] ?> <button onclick="openModal('phone')">Ubah</button></p>
    <p><b>Tanggal Daftar:</b> <?= date('d-m-Y', strtotime($user['created_on'])) ?></p>
  </div>

  <!-- Modal -->
  <div id="updateModal" style="display:none;">
    <form action="<?= base_url('UserController/update_user') ?>" method="post">
      <input type="text" id="field" name="field">
      <input type="text" id="value" name="value">
      <button type="submit">Simpan</button>
    </form>
  </div>
</div>

<script>
  function openModal(field) {
    document.getElementById('updateModal').style.display = 'block';
    document.getElementById('field').value = field;
  }
</script>