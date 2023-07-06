<?php
require_once(dirname(__DIR__) . '/Controller/Contact.php');
$Data = new Contact();
$Response = [];
$titles = $Data->titleArray;

if (isset($_POST) && count($_POST) > 0) {
  $Response = $Data->editContact($_POST, $_GET['id']);
}
$Contact = $Data->getContact($_GET['id']);

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <div class="flex-container-title">
        <h2>Update Contact:</h2>
        <a href="contacts_read.php" class="go-back">Back to overview &#11152;</a>
      </div>
      <hr class="title-separator">
      <form action="" method="POST" novalidate>
        <div class="input-container">
          <label for="user-title" aria-label="title">*Title</label>
          <select name="titles" id="title">
            <?php
            // output <option>s w/ value
            foreach ($titles as $key => $value) {
              echo "<option value=\"" . $key . "\"";
              if (isset($_POST['titles']) && $_POST['titles'] == $key) {
                echo " selected";
              } else if (isset($Contact['data']['contact_title']) && $Contact['data']['contact_title'] == $key) {
                echo " selected";
              }
              echo ">" . $value . "</option>";
            }
            // foreach ($titles as $key => $value) {
            //   $selected = ((isset($Contact['data']['contact_title']) && $Contact['data']['contact_title'] === $key) || (isset($_POST['titles']) && $_POST['titles'] === $key)) ? 'selected' : '';
            //   echo "<option value=\"$key\" $selected>$value</option>";
            // }
            ?>
          </select>
        </div>
        <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
          <span class="error-span"><?= $Response['title']; ?></span>
        <?php endif; ?>
        <div class="input-container">
          <label for="given-name">Given name:</label>
          <input name="given-name" type="text" id="given-name" value="<?= (isset($_POST['given-name'])) ? $_POST['given-name'] : $Contact['data']['contact_given_name'] ?>">
          <?php if (isset($Response['given-name']) && !empty($Response['given-name'])) : ?>
            <span class="error-span"><?= $Response['given-name']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="family-name">Family name:</label>
          <input name="family-name" type="text" id="family-name" value="<?= (isset($_POST['family-name'])) ? $_POST['family-name'] : $Contact['data']['contact_family_name'] ?>">
          <?php if (isset($Response['family-name']) && !empty($Response['family-name'])) : ?>
            <span class="error-span"><?= $Response['family-name']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="business">Business:</label>
          <input name="business" type="text" id="business" value="<?= (isset($_POST['business'])) ? $_POST['business'] : $Contact['data']['contact_business'] ?>">
          <?php if (isset($Response['business']) && !empty($Response['business'])) : ?>
            <span class="error-span"><?= $Response['business']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="address">Address:</label>
          <input name="address" type="text" id="address" value="<?= (isset($_POST['address'])) ? $_POST['address'] : $Contact['data']['contact_address'] ?>">
          <?php if (isset($Response['address']) && !empty($Response['address'])) : ?>
            <span class="error-span"><?= $Response['address']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="zip">Zip:</label>
          <input name="zip" type="number" id="zip" value="<?= (isset($_POST['zip'])) ? $_POST['zip'] : $Contact['data']['contact_zip'] ?>">
          <?php if (isset($Response['zip']) && !empty($Response['zip'])) : ?>
            <span class="error-span"><?= $Response['zip']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="town">Town:</label>
          <input name="town" type="text" id="town" value="<?= (isset($_POST['town'])) ? $_POST['town'] : $Contact['data']['contact_town'] ?>">
          <?php if (isset($Response['town']) && !empty($Response['town'])) : ?>
            <span class="error-span"><?= $Response['town']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="tel">Phone number:</label>
          <input name="tel" type="number" id="tel" value="<?= (isset($_POST['tel'])) ? $_POST['tel'] : $Contact['data']['contact_tel'] ?>">
          <?php if (isset($Response['tel']) && !empty($Response['tel'])) : ?>
            <span class="error-span"><?= $Response['tel']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="email">Email:</label>
          <input name="email" type="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : $Contact['data']['contact_email'] ?>">
          <?php if (isset($Response['email']) && !empty($Response['email'])) : ?>
            <span class="error-span"><?= $Response['email']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="create" class="update-btn">Update</button>
        <?php if (isset($Response['status']) && !$Response['status']) :  ?>
          <span class="error-span"><?= $Response['status'] ?></span>
        <?php endif; ?>
      </form>
    </section>
</body>
</main>

</body>

</html>