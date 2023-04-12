<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="We’re looking forward to hearing about your project. Contact us now or schedule a meeting.">
  <title>Contact</title>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" id="16" type="image/png" href="assets/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" id="ico" href="assets/favicon/favicon.ico">
  <meta name="application-name" content="AVD" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="favicon/mstile-144x144.png" />
  <link rel="preload" as="font" href="https://use.typekit.net/zoc8kfz.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/back_to_top_btn.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
  <script src="js/mobile_navigation.js" defer></script>
  <script src="js/contact_form_validation.js" defer></script>
  <script src="js/back_to_top_btn.js" defer></script>
  <script src="js/favicon_match_media.js" defer></script>
</head>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include('includes/navigation.inc.php'); ?>
  </header>
  <main id="main">
    <div class="title-section">
      <h1>Contact</h1>
      <hr class="title">
    </div>
    <!-- CONTACT FORM -->
    <form method="post" id="contact-form" novalidate>
      <div class="user-title-container">
        <label for="user-title" aria-label="title">*Title</label>
        <select name="titles" id="user-title">
          <option value="">Title</option>
          <option value="mr">Mr.</option>
          <option value="mrs">Mrs.</option>
          <option value="ms">Ms.</option>
          <option value="ms">Other</option>
        </select>
      </div>
      <div class="names-container">
        <div class="input-container given-name-container">
          <input type="text" id="given-name" aria-label="given-name" autocomplete="given-name" placeholder="*First name" required>
          <label for="given-name" class="placeholder">*First name</label>
        </div>
        <div class="input-container family-name-container">
          <input type="text" id="family-name" aria-label="family-name" autocomplete="family-name" placeholder="*Last name" required>
          <label for="family-name" class="placeholder">*Last name</label>
        </div>
      </div>
      <div class="input-container business-container">
        <input type="text" id="business" aria-label="business" placeholder="Business">
        <label for="business" class="placeholder">Business</label>
      </div>
      <div class="address-container">
        <div class="input-container street-container">
          <input type="text" id="address" aria-label="address" placeholder="*Address" required>
          <label for="address" class="placeholder">*Address</label>
        </div>
        <div class="input-container zip-container">
          <input type="text" id="zip" aria-label="zip" autocomplete="postal-code" placeholder="*Post code" required>
          <label for="zip" class="placeholder">*Post code</label>
        </div>
      </div>
      <div class="input-container town-container">
        <input type="text" id="town" aria-label="town" placeholder="*Town" required>
        <label for="town" class="placeholder">*Town</label>
      </div>
      <div class="contact-methods-container">
        <div class="input-container tel-container">
          <input type="tel" id="tel" aria-label="phone-number" autocomplete="tel" placeholder="*Tel" required>
          <label for="tel" class="placeholder">*Tel <small>(please include country code)</small></label>
        </div>
        <div class="input-container email-container">
          <input type="email" id="email" aria-label="email" autocomplete="email" placeholder="*E-mail" required>
          <label for="email" class="placeholder">*E-mail</label>
        </div>
      </div>
      <div class="message-container">
        <label for="message">*Message <small>(min. 30 characters)</small></label>
      </div>
      <textarea name="message" id="message" aria-label="your message" cols="30" rows="8" required></textarea>
      <div class="form-buttons">
        <div class="dropbox">
          <input type="file" id="input-file" aria-label="Chose file" multiple>
        </div>
        <div id="lottie-container">
          <button type="submit" class="submit" aria-label="Submit the contact form"></button>
        </div>
      </div>
    </form>
    <!-- SCHEDULING SECTION -->
    <section class="scheduling">
      <h2 class="schedule">Schedule a meeting</h2>
      <picture class="embed">
        <source srcset="assets/images/calendar_embed.webp">
        <img src="assets/images/calendar_embed.jpeg" alt="Meeting scheduling software embed" class="meeting-scheduling-software-embed" width="1220" height="697">
      </picture>
      <div class="mail">
        <a href="mailto:alandra.villalaz@gmail.com" class="mail-icon" aria-label="Send us an email">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.51 69.2">
            <path stroke="#000" stroke-miterlimit="10" stroke-width="3" d="M10.23 62.27c.93.45 1.98.71 3.09.71h70.87c1.11 0 2.15-.25 3.09-.71L59.36 35.99l-9.1 7.5c-.87.72-2.13.72-3 0l-9.1-7.5-27.93 26.28Zm-3.32-3.36.07-.07 27.5-25.88L7.09 10.41c-.06-.05-.12-.1-.17-.15-.44.93-.69 1.96-.69 3.06v42.57c0 1.08.24 2.11.68 3.03Zm83.7 0c.43-.92.68-1.94.68-3.03V13.31c0-1.09-.25-2.13-.69-3.06-.05.05-.11.11-.17.15L63.05 32.95l27.5 25.88s.05.04.07.07Zm-3.37-52a7.07 7.07 0 0 0-3.05-.69H13.31c-1.09 0-2.12.25-3.05.69L48.74 38.6l38.5-31.69ZM13.31 1.5h70.88C90.71 1.5 96 6.79 96 13.31v42.58c0 6.52-5.29 11.81-11.81 11.81H13.31C6.79 67.7 1.5 62.41 1.5 55.89V13.31C1.5 6.79 6.79 1.5 13.31 1.5Z" />
          </svg>
        </a>
        <a href="mailto:alandra.villalaz@gmail.com" class="mail-address" aria-label="Send us an email">alandra.villalaz@gmail.com</a>
      </div>
      <p class="phrase">We're looking forward to hearing about your project!</p>
    </section>
    <!-- ADDRESS AND GOOGLE MAPS -->
    <section class="address">
      <!-- NOTE -->
      <!-- the current google maps embed will be replaced by the usage of the google maps ebmed API -->
      <div class="gmap_canvas">
        <iframe title="Google maps embed" width="700" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=zurich&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
      </div>
      <div class="address">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.17 104.14">
          <path d="M32.58 0C14.59 0 0 14.59 0 32.58c0 3.61.59 7.09 1.68 10.34 1.37 2.74 2.75 5.48 4.12 8.22 8.86 17.66 17.7 35.33 26.56 53 8.86-17.45 17.71-34.91 26.57-52.36 1.57-3.11 3.15-6.21 4.73-9.33l.04-.12c.96-3.08 1.48-6.35 1.48-9.74C65.17 14.59 50.58 0 32.58 0Zm4.79 42.58c-1.45.7-3.08 1.09-4.79 1.09s-3.2-.36-4.6-1c-3.83-1.74-6.49-5.6-6.49-10.08 0-6.12 4.96-11.09 11.09-11.09s11.09 4.97 11.09 11.09c0 4.41-2.57 8.21-6.3 10Z" />
        </svg>
        <h2 class="h2-address">Zurich, Switzerland</h2>
      </div>
    </section>
  </main>
  <?php include('includes/footer.inc.php'); ?>